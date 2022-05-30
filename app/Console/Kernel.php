<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Cache;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {

            $filesystem = new Filesystem();

            // Getting all files from directory
            $resizedFiles = $filesystem->files('public/images/api/resized/');
            $croppedFiles = $filesystem->files('public/images/api/cropped/');

            // Clearing cache (keys = image names)
            foreach ($resizedFiles as $file) {

                // cache keys = width of image + _ + resized. E.g : 200_resized
                $cacheKey = explode('_', $filesystem->name($file));

                Cache::forget($cacheKey[0] . '_resized');
            }

            foreach ($croppedFiles as $file) {

                // cache keys = width of image + heigth of image + _ + resized. E.g : 200_300_cropped
                $cacheKey = explode('_', $filesystem->name($file));
                // $cacheKey[0] = $w;  $cacheKey[1] = $h 
                echo $cacheKey[0] . '_' . $cacheKey[1] . '\n';
                Cache::forget($cacheKey[0] . $cacheKey[1] . '_cropped');
            }

            // Deleting all files in folder
            $filesystem->cleanDirectory('public/images/api/resized/');
            $filesystem->cleanDirectory('public/images/api/cropped/');

        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
