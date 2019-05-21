<?php

namespace App\Observers;

use App\Picture;
use Illuminate\Support\Facades\Storage;

class PictureObservable
{
    /**
     * Handle the picture "deleted" event.
     *
     * @param  \App\Picture  $picture
     * @return void
     */
    public function deleted(Picture $picture)
    {
        Storage::delete('images/' . $picture->path);
    }
}
