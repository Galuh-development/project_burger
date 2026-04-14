<?php

namespace App\Helpers;

class ImageHelper
{
    public static function uploadAndResize($file, $directory, $fileName, $width = null, $height = null)
    {
        $destinationPath = public_path($directory);

        // ✅ Pastikan folder ada
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $extension = strtolower($file->getClientOriginalExtension());

        switch ($extension) {
            case 'jpeg':
            case 'jpg':
                $image = imagecreatefromjpeg($file->getRealPath());
                break;
            case 'png':
                $image = imagecreatefrompng($file->getRealPath());
                break;
            case 'gif':
                $image = imagecreatefromgif($file->getRealPath());
                break;
            default:
                throw new \Exception('Unsupported image type');
        }

        if (!$image) {
            throw new \Exception('Image could not be created');
        }

        // ✅ Resize
        if ($width) {
            $oldWidth  = imagesx($image);
            $oldHeight = imagesy($image);
            $aspectRatio = $oldWidth / $oldHeight;

            if (!$height) {
                $height = $width / $aspectRatio;
            }

            $newImage = imagecreatetruecolor($width, $height);
            imagecopyresampled(
                $newImage,
                $image,
                0, 0, 0, 0,
                $width, $height,
                $oldWidth, $oldHeight
            );

            imagedestroy($image);
            $image = $newImage;
        }

        // ✅ Full path aman
        $fullPath = $destinationPath . DIRECTORY_SEPARATOR . $fileName;

        switch ($extension) {
            case 'jpeg':
            case 'jpg':
                imagejpeg($image, $fullPath, 90);
                break;
            case 'png':
                imagepng($image, $fullPath);
                break;
            case 'gif':
                imagegif($image, $fullPath);
                break;
        }

        imagedestroy($image);

        return $fileName;
    }
}
