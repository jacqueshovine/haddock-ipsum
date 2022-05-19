<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function show()
    {

        $image = Image::all()->random(1)->sole();
        
        $imagePath = 'images/api/' . $image->name . '.' . $image->extension;

        $fp = fopen($imagePath, 'rb');

        header("Content-Type: image/jpg");
        header("Content-Length:" . filesize($imagePath));

        return fpassthru($fp);
    }
}
