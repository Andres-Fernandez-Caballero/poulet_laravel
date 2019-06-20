<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Receta;

class PanelController extends Controller
{
    public function index(){
        $header = ['fondo'=>'poulet-header','titulo'=>'Panel Master Cheft'];

        try{
            $listaRecetas = Receta::all()
                ->where('categoria','!=','Postres')
                ->sortBy('categoria')
                ->groupBy('categoria');

        }catch (\Exception $exception){
            $error = $exception->getMessage();
            return \view('web.page_error')->with('error',$error);
        }
        return view('panel.index')
            ->with('header',$header)
            ->with('listaRecetas',$listaRecetas);
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

    public function agregarReceta(){
        $header = ['fondo'=>'poulet-header','titulo'=>'Agregar Receta'];
        $autores = Autor::all();
        return view('panel.form_agregar')
            ->with('header',$header)
            ->with('categorias',Receta::$LISTA_CATEGORIAS)
            ->with('dificultades',Receta::$LISTA_DIFICULTADES)
            ->with('tiempos',Receta::$LISTA_TIEMPOS)
            ->with('autores',$autores);


    }

}
