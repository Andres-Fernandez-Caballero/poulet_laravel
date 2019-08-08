<?php

namespace App\Http\Controllers;

use App\Header;
use App\Models\Autor;
use App\Models\Receta;
use App\User;
use Doctrine\DBAL\Driver\Mysqli\MysqliException;
use Doctrine\DBAL\Query\QueryException;
use Faker\Provider\File;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use League\Flysystem\FileNotFoundException;

class WebController extends Controller
{
    public function index()
    {
        $header = ['fondo' => 'poulet-header', 'titulo' => 'Poulet Recetas'];
        //TODO: mostrar el texto de home por medio de un archivo o base de datos

        $tIntro = 'ups parece q no encontramos la introduccion -_-';
        try {
            $texto = $this->leerArchivo('text/intro.andres' );

        } catch (FileNotFoundException $fileNotFoundException) {
            abort(404);
        }
        return view("web.index")
            ->with('header', $header)
            ->with('intro', $texto);
    }

    public function recetas()
    {
        try {
            $lista = Receta::all()
                ->where('categoria', '!=', 'Postres')
                ->sortBy('categoria')
                ->groupBy('categoria');

        } catch (\Exception $exception) {
            $error = $exception->getMessage();// TODO: solucionar el error no muestra el string de la exepcion
            $error = 'Error al conectar Base de Datos ';

            return view('web.page_error')->with('error', $error);
        }


        return view('web.recetas')
            ->with('lista', $lista);
    }

    public function postres(Receta $receta)
    {
        $header = ['fondo' => 'poulet-header-Postres', 'titulo' => 'Postres'];
        try {
            $lista = $receta->all()
                ->where('categoria', '=', 'Postres');
            $texto = $this->leerArchivo('text/intro_postre.andres');
        } catch (\Exception $exception) {
            //TODO: solucionar el problema de que no se puede mostrar el string de la exepcion
            $error = 'Error al conectar con base de datos'; //provisorio
            return view('web.page_error')
                ->with('error', $error);
        }

        return view('web.postres')
            ->with('lista', $lista)
            ->with('texto',$texto)
            ->with('header', $header);
    }

    public function preparacion($id)
    {

        try {
            $receta = Receta::find($id);

        } catch (\Exception $exception) {
            $error = 'Error al conectar con base de datos';// TODO: solucionar el problema de exepcion
            return \view('web.page_error')->with('error', $error);
        }

        $header = ['fondo' => 'poulet-header', 'titulo' => "$receta->titulo"];
        return view('web.preparacion')
            ->with('header', $header)
            ->with('receta', $receta);
    }

    public function autores()
    {
        try{
            $autores = Autor::all();
        }catch (MysqliException $mysqliException){
            //TODO: manejar exepcion
            return redirect()->route('web.index')->with('error','Error de mysql');
        }

        return \view('web.autores')->with('autores',$autores);
    }


}
