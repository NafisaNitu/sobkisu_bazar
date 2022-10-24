<?php

namespace App\Helpers;

class ImageUpload
{
    public static function upload($request, $fileNmae, $publicPath)
    {

        $image = $request->file($fileNmae);
        $reImage = time() . '.' . $image->getClientOriginalExtension();
        $dest = public_path($publicPath);
        $image->move($dest, $reImage);

        return $reImage;
    }
}
