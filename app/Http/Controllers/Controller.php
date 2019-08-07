<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\Cast\Object_;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function guardarImagen($carpeta,$imagen_path){
        if (Storage::disk('local')->exists($imagen_path)){
            Storage::disk('local')->delete($imagen_path);
        }
        $imagen_path = $this->imagenDesdeCarpeta($carpeta);
        return $imagen_path;
    }

    protected function imagenDesdeCarpeta($carpeta){
        return Storage::files($carpeta)[0];
    }
}
