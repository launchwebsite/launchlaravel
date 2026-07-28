<?php
namespace App\Traits;

trait ImageUpload
{

    public function ImageUpload($image, $foldername, $name)
    {

        $extension = $image->extension();

        $newimage_name = $name . time() . "." . $extension;

        $image->move(public_path('/storage/uploads/' . $foldername), $newimage_name);

        return $newimage_name;

    }

}
