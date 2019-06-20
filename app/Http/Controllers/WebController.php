<?php

namespace App\Http\Controllers;

use App\Header;
use App\Models\Receta;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class WebController extends Controller
{
    public function index(){
        $header = ['fondo'=>'poulet-header','titulo'=>'Poulet Recetas'];
        //TODO: mostrar el texto de home por medio de un archivo o base de datos
        return view("web.index")
            ->with('header',$header);
    }

    public function recetas(Receta $receta){

        try{
            $lista= $receta->all()
                ->where('categoria','!=','Postres')
                ->sortBy('categoria')
                ->groupBy('categoria');
        }catch (\Exception $exception){
            $error = $exception->getMessage();// TODO: solucionar el error no muestra el string de la exepcion
            $error = 'Error al conectar Base de Datos ';

            return view('web.page_error')->with('error',$error);
        }


        return view('web.recetas')
            ->with('lista',$lista);
    }

    public function postres(Receta $receta){
        $header = ['fondo'=>'poulet-header-Postres','titulo'=>'Postres'];
       try{
           $lista = $receta->all()
               ->where('categoria','=','Postres');
       }catch (\Exception $exception){
           //TODO: solucionar el problema de que no se puede mostrar el string de la exepcion
           $error = 'Error al conectar con base de datos'; //provisorio
           return view('web.page_error')
               ->with('error',$error);
       }

        return view('web.postres')
            ->with('lista',$lista)
            ->with('header',$header);
    }

    public function preparacion($id){

        try{
            $receta = Receta::find($id);

        }catch (\Exception $exception){
            $error = 'Error al conectar con base de datos';// TODO: solucionar el problema de exepcion
            return \view('web.page_error')->with('error',$error);
        }

        $header = ['fondo'=>'poulet-header','titulo'=>"$receta->titulo"];
        return view('web.preparacion')
            ->with('header',$header)
            ->with('receta',$receta);
    }

}
