<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait SaveFile
{
  public function saveFile($file, $previousImagePath = '', $path = '')
  {
    if ($previousImagePath != '') {
      $image_path = $previousImagePath;

      if (File::exists($image_path)) {
        File::delete($image_path);
      }
    }

    switch ($path) {
      case '':
        $image_name = time() . '.' . $file->extension();
        $file->move(public_path('images/'), $image_name);
        break;
      default:
        $image_name = '' . $path . '/' . time() . '.' . $file->extension();
        $file->move(public_path((string) $path), $image_name);
        break;
    }

    return $image_name;
  }
}
