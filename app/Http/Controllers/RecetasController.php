<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Http\Request;

class RecetasController extends Controller
{
    public function agregar(){
        //TODO: implementar el metodo agregar al formulario
    }

    public function editar(){
        //TODO:implementar el metodo editar al formulario
    }
    public function eliminar($id){

        try{
            $receta = Receta::find($id);
        }catch (\Exception $exception){
            dd($exception->getMessage());
        }

        if($receta->delete()){
            return redirect()->route('panel.index');
        }else
            return redirect()->route('web.index');
    }

}
