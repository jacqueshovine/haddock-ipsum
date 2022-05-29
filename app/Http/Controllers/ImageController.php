<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use \Gumlet\ImageResize;
use \Intervention\Image\ImageManager;

class ImageController extends Controller
{

    private int $minSize = 100;
    private int $maxSize = 2000;

    /**
     * To do : 
     * Look in DB image sizes to get images that are closest to asked dimensions
     * 
     */

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
        $imagick = new ImageManager(['driver' => 'imagick']);

        $image = $imagick->make($imagePath)->crop($w, $h);

        $resizedImagePath = 'images/api/cropped_' . $imageName;

        $image->save($resizedImagePath);

        return $resizedImagePath;

    }

    public function resizeImage($w, $imageName, $imagePath)
    {
        $imagick = new ImageManager(['driver' => 'imagick']);

        $image = $imagick->make($imagePath)->widen($w);

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
