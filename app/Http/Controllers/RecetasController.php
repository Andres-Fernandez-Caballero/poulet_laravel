<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Http\Request;

class RecetasController extends Controller
{
    public function eliminar($id){

        try{
            $receta = Receta::find($id);
        }catch (\Exception $exception){
            dd($exception->getMessage());
        }

        if($receta->delete()){
            return redirect()->route('web.postres');
        }else
            return redirect()->route('web.index');
    }

}
