<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function createFile(){
        Storage::disk("local")->put("file.txt", "Contents");

    }

    public function getFile(){
        $exists = Storage::disk("local")->exists("file.txt");
        if ($exists){
            $contents = Storage::get("file.txt");
        }
        echo $contents;
    }

}
