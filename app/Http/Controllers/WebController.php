<?php

namespace App\Http\Controllers;

use App\Models\Receta;

class WebController extends Controller
{
    public function index(){
        return view("web.index");
    }

    public function recetas(Receta $receta){

        $lista= $receta->all()->groupBy('categoria');

        return view('web.recetas')
            ->with('lista',$lista);
    }
}
