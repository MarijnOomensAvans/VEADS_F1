<?php

namespace App\Http\Controllers\Backend;

use App\Donation;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->query('q');

        $donations = Donation::query()->orderBy('paid_at', 'desc');

        if (!empty($q)) {
            if (strtolower($q) == 'anoniem') {
                $donations = $donations->whereNull('first_name')
                    ->whereNull('last_name');
            } else {
                $donations = $donations->where(function($query) use ($q) {
                    $query->where('first_name', 'like', '%' . $q . '%')
                        ->orWhere('last_name', 'like', '%' . $q . '%')
                        ->orWhere('email', 'like', '%' . $q . '%');
                });
            }
        }

        $donations = $donations->paginate(15);

        return view('back.donations.index', compact('donations','q'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function show(Donation $donation)
    {
        return view('back.donations.show', compact('donation'));
    }

    public function refund(Request $request, Donation $donation)
    {
        if ($request->post('confirm') != 1) {
            return view('back.donations.refund', compact('donation'));
        }

        if (!$donation->payment->canBeRefunded()) {
            return redirect(action('Backend\DonationController@show', compact('donation')));
        }

        $donation->payment->refund([
            'amount' => [
                'currency' => 'EUR',
                'value' => number_format($donation->amount, 2, '.', '')
            ]
        ]);

        $donation->refunded_at = Carbon::now();
        $donation->save();

        return redirect(action('Backend\DonationController@show', compact('donation')));
    }
}
