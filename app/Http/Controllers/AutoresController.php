<?php

namespace App\Http\Controllers;

use App\Http\Requests\AutorCreateFormRequest;
use App\Models\Autor;
use App\Models\Receta;
use Doctrine\DBAL\Driver\Mysqli\MysqliException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AutoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header = ['fondo' => 'poulet-header', 'titulo' => 'Listado de Autores'];

        try {
            $autores = Autor::all()
                ->sortBy('create_at',SORT_REGULAR,true);
        } catch (MysqliException $mysqliException) {
            //TODO: manejar exepcion mysql
            return redirect()->route('web.index')->withErrors('Error mysql');
        }

        return view('panel.autores')
            ->with('header', $header)
            ->with('autores', $autores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $header = ['fondo' => 'poulet-header', 'titulo' => 'Formulario crear Autor'];

        return view('formularios.form_crear_editar_autor')
            ->with('header', $header);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AutorCreateFormRequest $request)
    {
        $autor = new Autor(([
            'nombre' => $request['nombre'],
            'apellido' => $request['apellido'],
            'biografia' => $request['biografia'],

        ]));
        $autor->save();
        if ($request->hasFile('imagen')) {
            $carpeta = $autor->getCarpetaImg();
            $request->file('imagen')->store($carpeta);
            $rutaImg = $this->imagenDesdeCarpeta($carpeta);
            $autor->imagen = $rutaImg;
        }
        if ($autor->save()) {
            return redirect()->route('autor.index')->with('success', 'Autor creado con exito');
        } else {
            return redirect()->route('autor.index')->withErrors('error','Error al cargar autor');
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
        $header = ['fondo' => 'poulet-header', 'titulo' => 'Datos Autor'];
        try {
            $autor = Autor::find($id);
            $recetas_autor = Receta::where('fk_autor', $id)->get();

        } catch (MysqliException $mysqliException) {
            //TODO: atajar la exepcion
            return redirect()->route('web.index');
        }
        return view('web.autor')
            ->with('header', $header)
            ->with('autor', $autor)
            ->with('receta_autor', $recetas_autor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $header = ['fondo' => 'poulet-header', 'titulo' => 'Editor de Autores'];
        try {
            $autor = Autor::find($id);
        } catch (MysqliException $mysqliException) {
            //TODO: manejar la exepicion
            return redirect()->route('web.index');
        }

        return view('formularios.form_crear_editar_autor')
            ->with('header', $header)
            ->with('autor', $autor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AutorCreateFormRequest $request, $id)
    {
        try {
            $autor = Autor::find($id);
        } catch (MysqliException $mysqliException) {
            //TODO: manejar exepcion
            return redirect()->route('web.index');
        }
        $img = $autor->imagen;
        $nuevos_valores = $request->all();

        if ($request->hasFile('imagen')) {
            $carpeta = $autor->getCarpetaImg();
            $request->file('imagen')->store($carpeta);
            if (Storage::disk('local')->exists($img)) {
                Storage::disk('local')->delete($img);
            }
            $img = $this->imagenDesdeCarpeta($carpeta);


        }
        $nuevos_valores['imagen'] = $img;

        if ($autor->update($nuevos_valores)) {
            return redirect()->route('autor.index')->with('success','autor acutializado');
        } else {
            return redirect()->route('web.index')->with('error','Error al actualizar');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $autor = Autor::find($id);
        } catch (MysqliException $mysqliException) {
            //TODO: manejar exepcion
            return redirect()->route('web.index');
        }

        if ($autor->delete()) {
            if (Storage::disk('local')->exists($autor->imagen)) {
                Storage::disk('local')->deleteDirectory('autores/' . md5($autor->id_autor));
            }
            return redirect()->route('autor.index')->with('success', 'Autor Eliminado');
        } else {
            return redirect()->route('autor.index')->withErrors('Error al eliminar al autor');
        }
    }

}
