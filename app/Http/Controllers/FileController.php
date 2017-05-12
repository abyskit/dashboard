<?php

namespace AbysKit\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class FileController extends Controller
{
    /**
     * Upload image with watermark
     *
     * @param object $image
     * @param string $path
     * @param string $imageName
     * @return string
     */
    public static function upload_image($image, $path, $imageName = 'thumbnail')
    {
        $cleanDirectory = false;
        $path = '/uploads/' . $path . '/';

        if($imageName == 'thumbnail') {
            $imageName = uniqid('thumbnail_');
            $path .= 'thumbnails/';
            $cleanDirectory = !$cleanDirectory;
        }

        (!File::exists(public_path($path))) && File::makeDirectory(public_path($path),  0755, true);
        ($cleanDirectory) && File::cleanDirectory(public_path($path));

        return $path . Image::make($image->getRealPath())
                ->insert(public_path(config('abyskit.watermark_url')))
                ->save(public_path($path . $imageName .".". $image->getClientOriginalExtension()))->basename;
    }

    /**
     * Resize the image
     *
     * @param string $imagePath
     * @param mixed $width
     * @param mixed $height
     * @return string
     */
    public static function resize_image($imagePath, $width = null, $height = null)
    {
        $explodedPath = explode('/', $imagePath);
        $explodedPathLast = count($explodedPath) - 1;
        $fileExtension = explode('.', $explodedPath[$explodedPathLast])[1];
        $path = implode("/", array_except($explodedPath, $explodedPathLast)) . "/";

        $img = Image::make(public_path($imagePath));

        return $path . $img->fit($width, $height, function ($constraint) {
                $constraint->upsize();
            })->save(public_path($path . uniqid('thumbnail_') . '.' . $fileExtension))->basename;
    }
}
