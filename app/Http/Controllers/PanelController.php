<?php

namespace App\Http\Controllers;

use App\Consulta;
use App\Models\Autor;
use App\Models\Receta;
use App\User;
use Doctrine\DBAL\Driver\Mysqli\MysqliException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PanelController extends Controller
{
    public function index(){
        $auth_user = null;
        if(Auth::check()){
            $auth_user = Auth::user();
        }
        $header = ['fondo'=>'poulet-header','titulo'=>'Panel Master Cheft'];

        try{
        //cargo todos los usuarios de la base de datos en una variable usuarios
        $usuarios = User::all();
        //cargo todas las consultas de la base de datos en una variable consultas
        $consultas = Consulta::all();
        //uno la tabla autores y recetas y cuento todas las recetas que posee cada autor
        $autores = DB::table('autores')
            ->join('recetas' , 'autores.id_autor', '=', 'recetas.fk_autor')
            ->select(DB::raw('nombre , count(id_recetas) as cant_recetas'))
            ->groupBy('autores.id_autor')
            ->get();
        //cargo todas las recetas de la base de datos en una variable recetas
        $recetas = Receta::all()
            ->sortBy('categoria')
            ->groupBy('categoria');

        }catch (MysqliException $mysqliException){
            //TODO: manipular exepcion
            return redirect()->route('web.index')->withErrors('Error de conexion mysql');
        }
        $lista_autores = [];
        foreach ($autores as $autor){
          $lista_autores[$autor->nombre] = $autor->cant_recetas;
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
}
