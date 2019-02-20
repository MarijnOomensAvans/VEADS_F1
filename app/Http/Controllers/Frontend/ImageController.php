<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller {
    public function show(string $hashname) {
        if (!Storage::exists("images/" . $hashname)) {
            return response()->setStatusCode(404);
        }



        return Storage::download("images/" . $hashname);
    }
}