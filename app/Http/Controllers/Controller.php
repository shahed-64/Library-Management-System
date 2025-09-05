<?php

namespace App\Http\Controllers;

abstract class Controller
{
    /**
     * Image Upload
     */

    protected function uniqueFileName($files = null){

        $uniqueFileName =  time().'.'.$files-> getClientOriginalExtension();
        return $uniqueFileName;

    }


    protected function fileUpload($files =  null, $path = 'media'){

        $fileName = $this -> uniqueFileName($files);

        $files-> move(public_path($path), $fileName);
        $path = $fileName;

        return $fileName;
    }

}
