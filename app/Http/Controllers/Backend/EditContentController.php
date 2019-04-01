<?php

namespace App\Http\Controllers\Backend;

use App\EditableContentCategory;
use App\EditContent;
use App\Http\Controllers\Controller;
use App\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EditContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = EditableContentCategory::orderBy('category')->get();
        return view('back.edit_content.index', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EditContent  $editContent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        foreach(EditContent::get() as $content) {
            if (!$request->has($content->key)) {
                if ($content->type != 'image') {
                    // Remove content if no content is submitted
                    $content->content = '';
                    $content->save();
                }

                continue;
            }

            switch($content->type) {
                case 'text':
                case 'textarea':
                    $content->content = $request->post($content->key);
                    $content->save();
                    break;

                case 'image':
                    if (!empty($content->content)) {
                        $picture = Picture::find($content->content);

                        if (!empty($picture)) {
                            Storage::delete('images/' . $picture->path);
                            $picture->delete();
                        }
                    }

                    $image = $request->file($content->key);
                    $name = $image->getClientOriginalName();
                    $filename = $image->hashName();
                    $image->storeAs('images', $filename);

                    $picture = new Picture();
                    $picture->name = $name;
                    $picture->path = $filename;
                    $picture->date = \DateTime::createFromFormat('U', $image->getCTime());
                    $picture->save();

                    $content->content = $picture->id;
                    $content->save();
                    break;

                case 'checkbox':
                    $content->content = (bool) $request->post($content->key);
                    $content->save();
                    break;
            }
        }

        return redirect(action('Backend\EditContentController@index'));
    }
}