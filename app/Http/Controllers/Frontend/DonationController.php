<?php
namespace App\Http\Controllers\Frontend;

use App\Donation;
use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDonationRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mollie\Api\Resources\Payment;
use Mollie\Laravel\Facades\Mollie;

class DonationController extends Controller {
    public function index() {
        $events = Event::where('published', 1)->get();
        $volunteer = null;

        if (!Auth::guest() && !empty(Auth::user()->volunteer)) {
            $volunteer = Auth::user()->volunteer;
        }

        return view('front.win-win.donate', compact('events', 'volunteer'));
    }

    public function preparePayment(StoreDonationRequest $request) {
        $validated = $request->validated();

        if (isset($validated['anonymous'])) {
            unset($validated['first_name']);
            unset($validated['last_name']);
            unset($validated['email']);
        }

        $donation = new Donation($validated);
        $donation->save();

        $data = [
            'amount' => [
                'currency' => 'EUR',
                'value' => number_format($donation->amount, 2, '.', '')
            ],
            'description' => 'Donatie aan VEADS',
            'redirectUrl' => action('Frontend\DonationController@redirect', compact('donation'))
        ];

        if (!app()->isLocal()) {
            $data['webhookUrl'] = action('Frontend\DonationController@webhook');
        }

        $payment = Mollie::api()->payments()->create($data);

        $donation->payment_id = $payment->id;
        $donation->save();

        return redirect($payment->getCheckoutUrl(), 303);
    }

    public function redirect(Donation $donation) {
        if (empty($donation->payment_id)) {
            return abort(404);
        }

        $payment = $donation->payment;

        $this->processMolliePayment($payment, $donation);

        $success = false;
        $pending = false;
        $error = false;

        if ($payment->isFailed() || $payment->isCanceled() || $payment->isExpired()) {
            $error = true;
        } else if ($payment->isPending() || $payment->isOpen()) {
            $pending = true;
        } else {
            $success = true;
        }

        return view('front.win-win.donationThanks', compact('success', 'pending', 'error'));
    }

    public function webhook(Request $request) {
        if (!$request->has('id')) {
            return abort(400);
        }

        $donation = Donation::where('payment_id', $request->id)->first();

        if (empty($donation)) {
            return abort(404);
        }

        $payment = $donation->payment;

        $this->processMolliePayment($payment, $donation);

        return response();
    }

    private function processMolliePayment(Payment $payment, Donation $donation) {
        if ($payment->isPaid()) {
            $donation->paid_at = Carbon::parse($payment->paidAt)->setTimezone(config('app.timezone'));
        } else if ($payment->isExpired()) {
            $donation->failed_at = Carbon::parse($payment->expiresAt)->setTimezone(config('app.timezone'));
        }

        if ($payment->isCanceled()) {
            $donation->failed_at = Carbon::parse($payment->canceledAt)->setTimezone(config('app.timezone'));
        }

        if ($payment->isFailed()) {
            $donation->failed_at = Carbon::parse($payment->failedAt)->setTimezone(config('app.timezone'));
        }

        $donation->save();
    }
}
