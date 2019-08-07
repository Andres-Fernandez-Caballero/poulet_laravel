<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecetaUpdateRequest;
use App\Http\Requests\ResetasFormRequest;
use App\Models\Autor;
use App\Models\Receta;
use Doctrine\DBAL\Driver\Mysqli\MysqliException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Psy\Util\Str;

class RecetasController extends Controller
{
    private const IMAGEN_DEFAULT = 'img/quemada.jpg';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header = ['fondo' => 'poulet-header', 'titulo' => 'Listado De Recetas'];

        try {
            $recetas = Receta::all()->sortBy('categoria');
        } catch (MysqliException $mysqliException) {
            return redirect()->route('web.index');
        }

        /*
         * Tengo la idea de crear un formulario
         *  para filtrar por categorias
         *
        $lista_recetas = [];
        foreach ($recetas as $receta){
            // algoritmo de iteracion
        }
        */

        return view('panel.recetas')
            ->with('header', $header)
            ->with('recetas', $recetas);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $header = ['fondo' => 'poulet-header', 'titulo' => 'Listado De Recetas'];
        try {
            $autores = Autor::all();
        } catch (MysqliException $mysqliException) {
            return redirect()->route('web.index');
        }

        $datos = [
            'autores' => $autores,
            'categorias' => Receta::$LISTA_CATEGORIAS,
            'tiempos' => Receta::$LISTA_TIEMPOS,
            'dificultades' => Receta::$LISTA_DIFICULTADES,
        ];
        return view('formularios.form_crear_receta')
            ->with('header', $header)
            ->with('datos', $datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResetasFormRequest $request)
    {

        $receta = new Receta([
            'titulo' => $request->get('titulo'),
            'preparacion' => $request->get('preparacion'),
            'fk_autor' => $request->get('fk_autor'),
            'categoria' => $request->get('categoria'),
            'dificultad' => $request->get('dificultad'),
            'tiempo_preparacion' => $request->get('tiempo_preparacion'),
        ]);
        //tengo q salarlo 2 veces primero para crear un id de la receta ... alo esta mal lo se...
        $receta->save();
        if ($request->hasFile('imagen')){
            $carpeta = 'recetas/' . md5($receta->id_recetas);
            $img = $request->file('imagen')->store($carpeta);
            $rutaImg = Storage::files($carpeta)[0];
            $receta->imagen = $rutaImg;
        }

        if ($receta->save()) {
            return redirect()->route('receta.index')->with('success', 'Receta creada con exito');
        } else {
            return redirect()->route('panel.agregarReceta');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $header = ['fondo' => 'poulet-header', 'titulo' => 'Preparacion'];

        try {
            $recetum = Receta::find($id);
        } catch (MysqliException $mysqliException) {
            //TODO: manejar exepcion mysql
        }
        return view('web.preparacion')
            ->with('header', $header)
            ->with('receta', $recetum);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $header = ['fondo' => 'poulet-header', 'titulo' => 'Editor de recetas'];

        try {
            $autores = Autor::all();
            $receta = Receta::find($id);
            $autor_receta = Autor::find($receta->fk_autor)->nombre;
        } catch (MysqliException $mysqliException) {
            return redirect()->route('receta.index')
                ->withErrors('no se pudo acceder a la base de datos');
        }
        $datos = [
            'autores' => $autores,
            'categorias' => Receta::$LISTA_CATEGORIAS,
            'tiempos' => Receta::$LISTA_TIEMPOS,
            'dificultades' => Receta::$LISTA_DIFICULTADES,
            'receta' => $receta,
            'autor_receta' => $autor_receta,
        ];

        return view('formularios.form_crear_receta')
            ->with('header', $header)
            ->with('datos', $datos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(RecetaUpdateRequest $request, $id)
    {
        try{
            $receta = Receta::find($id);
        }catch (MysqliException $mysqliException){
            //TODO: manejar exepcion
            return redirect()->route('web.index');
        }

        $nuevos_valores = $request->all();
        //si tengo una imagen el request file (imagen) existe sino no...
        if ($request->file('imagen')) {
            //metodos para actualizar imagen
            $imagen = $receta->imagen;
            $carpeta = 'recetas/' . md5($receta->id_recetas);

            if (Storage::disk('local')->exists($imagen)) {
                Storage::disk('local')->delete($imagen);
            }
            $request->file('imagen')->store($carpeta);
            $imagen = Storage::files($carpeta[0]);
            $nuevos_valores['imagen'] = $imagen;
        }
        //no se modificio la imagen guardo los demas datos
        if($receta->update($nuevos_valores)){
            return redirect()->route('panel.index')->with('success','Datos actualizados');
        }else{
            return redirect()->back()->withErrors('Datos no actualizados')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        try {
            $receta = Receta::find($id);
        } catch (\Exception $exception) {
            //TODO:manejar la exepcion eliminar receta
            return redirect()->route('web.index')
                ->withErrors('Error al conectar a la base de datos');
        }


        if ($receta->delete()) {

            if (Storage::disk('local')->exists($receta->imagen)) {
                Storage::disk('local')->deleteDirectory('recetas/' . md5($receta->titulo));
            }

            //elimino la carpeta contenedora de la imagen
            return redirect()->back()->with('success', 'la receta se elimino con exito');
        } else {
            return redirect()->back()->with('error', 'error al eliminar');
        }

    }

    /* implementar mas tarde
    private function crearCarpeta(Receta $receta){
        return 'recetas/'.md5($receta->titulo);
    }
    */
}
