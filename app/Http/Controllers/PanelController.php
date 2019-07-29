<?php

namespace App\Http\Controllers;

use App\Consulta;
use App\Models\Autor;
use App\Models\Receta;
use App\User;
use Doctrine\DBAL\Driver\Mysqli\MysqliException;
use Illuminate\Support\Facades\Auth;


class PanelController extends Controller
{
    public function index(){
        $auth_user = null;
        if(Auth::check()){
            $auth_user = Auth::user();
        }
        $header = ['fondo'=>'poulet-header','titulo'=>'Panel Master Cheft'];

        try{
        $usuarios = User::all();
        $consultas = Consulta::all();
        $autores = Autor::all();
        $recetas = Receta::all()
            ->sortBy('categoria')
            ->groupBy('categoria');
        }catch (MysqliException $mysqliException){
            //TODO: manipular exepcion
            return redirect()->route('web.index');
        }
        $lista_autores = [];
        foreach ($autores as $autor){
          $lista_autores[$autor->nombre] = 1;
        }


        //creo un array asociativo con las categorias y la cantidad de recetas por item
        $lista_recetas = [];
        foreach ($recetas as $categoria => $receta){
            $lista_recetas [$categoria] = count($receta);
        }

        $lista_usuarios = [];
        foreach ($usuarios as $usuario){
            $lista_usuarios[$usuario->name] = $usuario->rol;
        }

        $lista_consultas = [];
        foreach ($consultas as $consulta){
            $lista_consultas[$consulta->id] = ($consulta->revisado)?'Revisada':'Pendiente';
        }

        $datos = [
            'lista_autores' => $lista_autores,
            'lista_usuarios' => $lista_usuarios,
            'lista_recetas' => $lista_recetas,
            'lista_consultas' => $lista_consultas,
        ];


        return view('panel.index')
            ->with('header',$header)
            ->with('auth_user',$auth_user)
            ->with('datos',$datos);
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

    public function listarAutores(){
        $header = ['fondo'=>'poulet-header','titulo'=>'Panel Master Cheft'];

        try{
            $listadoAutores = Autor::all();
        }catch (\Exception $ex){
            //TODO implementar exepcion
        }
        return view('panel.autores')
            ->with('header',$header)
            ->with('listaAutores',$listadoAutores);
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
