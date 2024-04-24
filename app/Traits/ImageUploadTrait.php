<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

trait ImageUploadTrait
{
    public function uploadImage(UploadedFile $file, $folderName)
    {
        // Generate a unique filename
        $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();

        // Store the file in the 'storage/profile_images' directory
        $file->storeAs('profile_images', $filename, 'public');
    
        return $filename;
    }

    public function uploadmedia(UploadedFile $file, $folderName)
    {
        // Generate a unique filename
        $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();

        // Store the file in the 'storage/profile_images' directory
        $file->storeAs('media', $filename, 'public');
    
        return $filename;
    }


    public function deleteImage($folderName, $filename)
    {
        // Delete the image file from storage
        Storage::disk('public')->delete($folderName . '/' . $filename);
    }
}
