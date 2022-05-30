<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use \Gumlet\ImageResize;
use Illuminate\Support\Facades\Cache;
use \Intervention\Image\ImageManager;

class ImageController extends Controller
{

    private int $minSize = 100;
    private int $maxSize = 2000;
    private string $imageFolder = 'images/api/';
    // private int $cacheTimeSeconds = 600;

    /**
     * To do : 
     * Look in DB image sizes to get images that are closest to asked dimensions
     * 
     * Check if image exists on call
     * If yes, serve image
     * If not, run the functions
     * Flush created images folder on a regular basis
     */

    public function show($w = null, $h = null)
    {

        // Get random image in base
        $image = Image::query()->inRandomOrder()->first();

        $imageName = $image->name . '.' . $image->extension;

        // Create full image path
        $imagePath = $this->imageFolder . $image->name . '.' . $image->extension;

        if (!empty($h) && !empty($w)) {

            if (Cache::has($w . $h . '_cropped')) {
                $imagePath = Cache::get($w . $h . '_cropped');
            } else {
                $imagePath = $this->cropImage($w, $h, $imageName, $imagePath);
            }

        } else if (!empty($w)) {

            if (Cache::has($w . '_resized')) {
                $imagePath = Cache::get($w . '_resized');
            } else {
                $imagePath = $this->resizeImage($w, $imageName, $imagePath);
            }
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

        $croppedImagePath = $this->imageFolder . 'cropped/' . $w . '_' . $h . '_' . $imageName;

        $image->save($croppedImagePath);

        Cache::put($w . $h . '_cropped', $croppedImagePath);

        return $croppedImagePath;

    }

    public function resizeImage($w, $imageName, $imagePath)
    {
        $imagick = new ImageManager(['driver' => 'imagick']);

        $image = $imagick->make($imagePath)->widen($w);

        $resizedImagePath = $this->imageFolder . 'resized/' . $w . '_' . $imageName;

        $image->save($resizedImagePath);

        Cache::put($w . '_resized', $resizedImagePath);

        return $resizedImagePath;
    }

}
