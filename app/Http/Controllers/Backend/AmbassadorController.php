<?php

namespace App\Http\Controllers\Backend;

use App\Ambassador;
use App\Event;
use App\Http\Requests\StoreAmbassadorRequest;
use App\Http\Requests\UpdateAmbassadorRequest;
use App\Picture;
use DateTime;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class AmbassadorController extends Controller
{
    /**
     * Return paginated list with all the ambassadors
     *
     * @param Request $request
     * @return Factory|JsonResponse|View
     */
    public function index(Request $request)
    {
        $q = $request->query('q');

        $ambassadors = Ambassador::orderBy('name');

        if (!empty($q)) {
            $ambassadors = $ambassadors->where(function($query) use ($q) {
                $query->where('name', 'like', '%' . $q . '%')
                    ->orWhere('company', 'like', '%' . $q . '%');
            });
        }

        if ($request->has('published')) {
            $ambassadors = $ambassadors->where('published', (bool) $request->get('published'));
        }

        $ambassadors = $ambassadors->paginate(15);

        if ($request->query('json')) {
            return response()->json(compact('ambassadors', 'q'));
        }

        return view('back.ambassadors.index', compact('ambassadors', 'q'));
    }

    /**
     * Show form for creating a new ambassador
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('back.ambassadors.create');
    }

    /**
     * Store newly created ambassador
     *
     * @param StoreAmbassadorRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(StoreAmbassadorRequest $request)
    {
        $validated = $request->validated();

        $ambassador = new Ambassador($validated);

        if (!isset($validated['published'])) {
            $ambassador->published = false;
        } else {
            $ambassador->published = true;
        }

        $this->saveImage($ambassador, $validated['picture']);

        return redirect(action('Backend\AmbassadorController@show', compact('ambassador')));
    }

    /**
     * Display specific ambassador
     *
     * @param Ambassador $ambassador
     * @return Factory|View
     */
    public function show(Ambassador $ambassador)
    {
        return view('back.ambassadors.show', compact('ambassador'));
    }

    /**
     * Show form for editing a specific ambassador
     *
     * @param Ambassador $ambassador
     * @return Factory|View
     */
    public function edit(Ambassador $ambassador)
    {
        return view('back.ambassadors.edit', compact('ambassador'));
    }

    /**
     * Update specific ambassador
     *
     * @param UpdateAmbassadorRequest $request
     * @param Ambassador $ambassador
     * @return RedirectResponse|Redirector
     */
    public function update(UpdateAmbassadorRequest $request, Ambassador $ambassador)
    {
        $validated = $request->validated();

        $ambassador->fill($validated);

        if (isset($validated['picture'])) {
            $this->saveImage($ambassador, $validated['picture']);
        }

        if (!isset($validated['published'])) {
            $ambassador->published = false;
        } else {
            $ambassador->published = true;
        }

        $ambassador->save();

        return redirect(action('Backend\AmbassadorController@show', compact('ambassador')));
    }

    /**
     * Remove specific ambassador from database
     *
     * @param Ambassador $ambassador
     * @return RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(Ambassador $ambassador)
    {
        $ambassador->delete();
        $ambassador->picture->delete();

        return redirect(action('Backend\AmbassadorController@index'));
    }

    /**
     * Save ambassador image to storage and database
     *
     * @param Ambassador $ambassador
     * @param $image
     */
    private function saveImage(Ambassador $ambassador, $image) {
        $name = $image->getClientOriginalName();
        $filename = $image->hashName();
        $image->storeAs('images', $filename);

        $picture = new Picture();
        $picture->name = $name;
        $picture->path = $filename;
        $picture->date = DateTime::createFromFormat('U', $image->getCTime());
        $picture->save();

        $ambassador->picture()->associate($picture);
        $ambassador->save();
    }
}
