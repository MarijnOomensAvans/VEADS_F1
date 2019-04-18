<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePartner;
use App\Http\Requests\UpdatePartner;
use App\Picture;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->query('q');

        $partners = Partner::query();

        if (!empty($q)) {
            $partners = $partners->where(function($query) use ($q) {
                  $query->where('name', 'like', '%' . $q . '%');
              });
          }

          $partners = $partners->paginate(15);

          if ($request->query('json')) {
              return response()->json(compact('partners', 'q'));
            }

            return view('back.partners.index', compact('partners', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePartner $request)
    {
        $validated = $request->validated();

        $partner = new Partner($validated);
        $partner->save();

        $this->saveImage($partner, $request->file('image'));

        return redirect('admin/partners/' . $partner->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        return view('back.partners.show', compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        return view('back.partners.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePartner $request, Partner $partner)
    {
        $validated = $request->validated();
        $partner->fill($validated);
        $partner->save();

        if ($request->hasFile('image'))
        {
          $this->saveImage($partner, $request->file('image'));
        }
        return redirect('admin/partners/' . $partner->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        return view('back.partners.destroy', compact('partner'));
    }

    public function delete(Request $request, Partner $partner) {
        if (!empty($confirm = $request->post('confirm')) && $confirm == 1) {
            $picture = $partner->picture;

            $partner->picture_id=null;
            $partner->save();
            Storage::delete("images/" . $picture->path);
            $picture->delete();

            $partner->delete();
        }

        return redirect('admin/partners');
    }

    public function showFeatured() {
        $partners = Partner::whereNotNull('featured_position')->orderBy('featured_position', 'asc')->limit(3)->get();

        return view('back.partners.featured', compact('partners'));
    }

    public function storeFeatured(Request $request) {
        $positions = $request->post('position');

        if (!is_array($positions)) {
            return redirect('admin/partners/featured');
        }

        foreach($positions as $index => $position) {
            if (empty($position)) {
                continue;
            }

            \DB::table('partners')->where('featured_position', '=', $index)->update(['featured_position' => null]);

            $partners = Partner::find($position);

            $partners->featured_position = $index;
            $partners->save();
        }

        return redirect('admin/partners/featured');
    }

    public function destroyImage(Partner $partner, Picture $picture) {
        return view('back.partners.image', compact('partner', 'picture'));
    }

    public function deleteImage(Request $request, Partner $partner, Picture $picture) {
        if (!empty($confirm = $request->post('confirm')) && $confirm == 1) {
            Storage::delete("images/" . $picture->path);
            $picture->partners()->detach();
            $picture->delete();
        }

        return redirect('admin/partners/' . $partner->id);
    }

    private function saveImage(Partner $partner, $image) {
        $name = $image->getClientOriginalName();
        $filename = $image->hashName();
        $image->storeAs('images', $filename);

        $picture = new Picture();
        $picture->name = $name;
        $picture->path = $filename;
        $picture->date = \DateTime::createFromFormat('U', $image->getCTime());
        $picture->save();

        $partner->picture_id=$picture->id;
        $partner->save();
    }
}
