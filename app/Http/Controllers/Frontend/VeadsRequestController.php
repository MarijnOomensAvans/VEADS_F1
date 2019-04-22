<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\StoreVeadsResponseRequest;
use App\VeadsRequest;
use App\VeadsResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VeadsRequestController extends Controller
{
    /**
     * Display a listing of the veads requests.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $requests = VeadsRequest::query();
        $q = $request->get('q');
        $type = $request->get('type');

        if (!empty($q)) {
            $requests = $requests->where('title', 'like', "%$q%");
        }

        if (!empty($type) && in_array($type, ['product', 'service', 'vacancy'])) {
            $requests = $requests->where('type', '=', $type);
        }

        $requests = $requests->paginate(15);

        $product_url = $request->fullUrlWithQuery(array_merge($request->query(), ['type' => 'product']));
        $service_url = $request->fullUrlWithQuery(array_merge($request->query(), ['type' => 'service']));
        $vacancy_url = $request->fullUrlWithQuery(array_merge($request->query(), ['type' => 'vacancy']));
        $reset_url = $request->url();

        return view('front.win-win.veads-request.index', compact('requests', 'q', 'type', 'product_url', 'service_url', 'vacancy_url', 'reset_url'));
    }

    /**
     * Store a newly created veads response in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVeadsResponseRequest $request, VeadsRequest $vrequest)
    {
        $validated = $request->validated();

        if (!isset($validated['description'])) {
            $validated['description'] = "";
        }

        $response = new VeadsResponse($validated);
        $response->request()->associate($vrequest);
        $response->save();

        return redirect(action('Frontend\VeadsRequestController@thanks'));
    }

    /**
     * Display the specified veads request.
     *
     * @param  \App\VeadsRequest  $veadsRequest
     * @return \Illuminate\Http\Response
     */
    public function show(VeadsRequest $request)
    {
        return view('front.win-win.veads-request.show', compact('request'));
    }

    public function thanks() {
        return view('front.win-win.veads-request.thanks');
    }
}
