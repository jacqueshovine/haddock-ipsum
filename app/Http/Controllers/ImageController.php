<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use \Gumlet\ImageResize;

class ImageController extends Controller
{

    private int $minSize = 100;
    private int $maxSize = 2000;

    public function show($w = null, $h = null)
    {

        // Get random image in base
        $image = Image::query()->inRandomOrder()->first();

        $imageName = $image->name . '.' . $image->extension;

        // Create full image path
        $imagePath = 'images/api/' . $image->name . '.' . $image->extension;

        if (!empty($h) && !empty($w)) {
            
            $imagePath = $this->cropImage($w, $h, $imageName, $imagePath);

        } else if (!empty($w)) {

            $imagePath = $this->resizeImage($w, $imageName, $imagePath);

        }

        // Open image file
        $fp = fopen($imagePath, 'rb');

        // Set headers
        header("Content-Type: image/" . $image->extension);
        header("Content-Length:" . filesize($imagePath));

        return fpassthru($fp);
    }

    public function cropImage($w, $h, $imageName, $imagePath)
    {
        $image = new ImageResize($imagePath);

        $image->crop($w, $h, $allow_enlarge = True);

        $resizedImagePath = 'images/api/resized_' . $imageName;

        $image->save($resizedImagePath);

        return $resizedImagePath;

    }

    public function resizeImage($w, $imageName, $imagePath)
    {
        $image = new ImageResize($imagePath);

        $image->resizeToWidth($w, $allow_enlarge = True);

        $resizedImagePath = 'images/api/resized_' . $imageName;

        $image->save($resizedImagePath);

        return $resizedImagePath;
    }

    /*
        TO DO

        # Check parameters and resize or crop accordingly
        # If both parameters specified => crop

        // $test = new \Gumlet\ImageResize()
    */
}
