<?php
namespace App\Helper;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait ImageManager {

    public function uploads($file, $path)
    {
        if($file) {
            $fileName   = time() . $file->getClientOriginalName();
            Storage::disk('public')->put($path . $fileName, File::get($file));
            $filePath   = $path . $fileName;
            return $filePath;
        }
    }
    public function removes($file)
    {
        if(Storage::disk('public')->exists($file)){
            Storage::disk('public')->delete($file);
        }
    }
}