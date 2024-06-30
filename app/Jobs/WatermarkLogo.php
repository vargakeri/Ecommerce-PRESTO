<?php

namespace App\Jobs;

use App\Models\Image;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use Illuminate\Queue\SerializesModels;
use Spatie\Image\Image as SpatieImage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class WatermarkLogo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $announcement_image_id;
    /**
     * Create a new job instance.
     */
    public function __construct($announcement_image_id)
    {
        $this->announcement_image_id = $announcement_image_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $i = Image::find($this->announcement_image_id);
        if (!$i) {
            return;
        }
        $srcPath = storage_path('app/public/' . $i->path);
        $image = file_get_contents($srcPath);

        $image = SpatieImage::load($srcPath);
        $paddingX = ($image->getWidth())/20;
        $paddingY = ($image->getHeight())/20;
        $h= ($image->getHeight())/10;
        $w = $h * 3.7;
        $image->watermark(base_path('storage/app/public/images/logo.png'))
        ->watermarkPosition('bottom')
        ->watermarkPadding($paddingX, $paddingY)
        ->watermarkWidth($w, Manipulations::UNIT_PIXELS)
        ->watermarkHeight($h, Manipulations::UNIT_PIXELS)
        ->watermarkFit(Manipulations::FIT_CROP);
        $image->save($srcPath);
    }
}
