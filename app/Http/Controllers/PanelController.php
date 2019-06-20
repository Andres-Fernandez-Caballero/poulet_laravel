<?php

namespace App\Http\Controllers;

use App\Models\Receta;

class PanelController extends Controller
{
    public function index(){
        $header = ['fondo'=>'poulet-header','titulo'=>'Panel Master Cheft'];

        try{
            $listaRecetas = Receta::all()
                ->groupBy('categoria')
                ->where('categoria','!=','Postres');

            $listaPostres = Receta::all()
                ->where('categoria','=','Postres');

        }catch (\Exception $exception){
            return \view('web.recetas');
        }
        return view('panel.index')
            ->with('header',$header)
            ->with('listaRecetas',$listaRecetas)
            ->with('listaPostres',$listaPostres);
    }

    public function listadoPostres(){

        $header = ['fondo'=>'poulet-header','titulo'=>'Panel Master Cheft'];

        try{
            $listadoPostres = Receta::all()->where('categoria','=','Postres');
        }catch (\Exception $exception){
            $error = $exception->getMessage();
            return view('web.page_error')->with('error',$error);
        }

        return view('panel.listado_postres')
            ->with('header',$header)
            ->with('listaPostres',$listadoPostres);

    }

}
