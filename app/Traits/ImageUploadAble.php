<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

/**
 * Trait ImageUploadAble
 * @package App\Traits
 */
trait ImageUploadAble
{
    /**
     * @param UploadedFile $file
     * @param string $folder
     * @param integer $width
     * @param integer $height
     * @return false|string
     */
    public function uploadImage(UploadedFile $file, $folder = 'images', $width = 600, $height = 600)
    {
        $path = $folder;
        /**
         * Appending 'public' folder location
         */
        $folder = "/public/" . $folder;

        /**
         * Generating unique name for image
         */
        $name = 'img_'.md5(uniqid() . microtime());

        /**
         * Make image from file and resize it
         */
        $image = Image::make($file)
            ->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            });

        /**
         * Create image folder if it doesn't exists and set appropriate permissions.
         */
        if (!Storage::exists($folder)) {
            Storage::makeDirectory($folder, 0775, true, true);
        }

        /**
         * Save image to the folder in storage
         */
        $image->save(storage_path('app' . $folder) . $name . '.' . $file->getClientOriginalExtension());

        return $path . $name . '.' . $file->getClientOriginalExtension();
    }

    /**
     * @param null $path
     */
    public function deleteImage($path = null)
    {
        if (Storage::exists('public/' . $path)) {
            Storage::delete('public/' . $path);
        }
    }
}
