<?php

namespace App\Http\Controllers;

use App\Models\Receta;

class WebController extends Controller
{
    public function index(){
        return view("web.index");
    }

    public function recetas(Receta $receta){

        $categorias = $receta->all()->groupBy('recetas.categoria');

        return view('web.recetas')
            ->with('categorias',$categorias);
    }
}
