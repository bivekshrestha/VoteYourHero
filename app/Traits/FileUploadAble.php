<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

/**
 * Trait UploadAble
 * @package App\Traits
 */
trait FileUploadAble
{
    /**
     * @param UploadedFile $file
     * @param null $folder
     * @param string $disk
     * @return false|string
     */
    public function uploadFile(UploadedFile $file, $folder = null, $disk = 'storage')
    {
        $name = md5(uniqid() .microtime());

        return $file->storeAs(
            $folder,
            $name . "." . $file->getClientOriginalExtension(),
            $disk
        );
    }

    /**
     * @param null $path
     */
    public function deleteFile($path = null)
    {
        if (Storage::exists('public/' . $path)) {
            Storage::delete('public/' . $path);
        }
    }
}
