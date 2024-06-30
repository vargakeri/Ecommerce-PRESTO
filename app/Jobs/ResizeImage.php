<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Illuminate\Bus\Queueable;
use Intervention\Image\ImageManager;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Spatie\Image\Manipulations;

class ResizeImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $w;
    private $h;
    private $fileName;
    private $path;

    /**
     * Create a new job instance.
     */
    public function __construct($filePath,$w,$h)
    {
        $this->path = dirname($filePath);
        $this->fileName = basename($filePath);
        $this->w = $w;
        $this->h = $h;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        $w = intval($this->w);
        $h = intval($this->h);
        $srcPath = storage_path() . '/app/public/' . $this->path . '/' . $this->fileName;
        $destPath = storage_path() . '/app/public/' . $this->path . "/crop_{$w}x{$h}_" . $this->fileName;
        $image= Image::load($srcPath);

        $croppedImage = $image->crop(Manipulations::CROP_CENTER, $w, $h)->save($destPath);
    }
}
