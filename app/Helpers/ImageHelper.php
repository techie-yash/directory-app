<?php
namespace App\Helpers;

class ImageHelper
{
    /**
     * Generate the URL for an image.
     *
     * @param string $imageName
     * @return string
     */
    public static function imageUrl($imageName)
    {
        $basePath = 'assets/webpage/images'; // Adjust the base path as needed
        return asset("$basePath/$imageName");
    }

    // You can add more helper methods here...
}
