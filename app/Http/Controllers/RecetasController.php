<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetasFormRequest;
use App\Models\Receta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

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
        $recetas = Receta::all();
        //TODO: crear vista panel recetas este mostrara la lista de las recetas
        return null; //view('panel.recetas')->with('recetas',$recetas);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResetasFormRequest $request)
    {
        //TODO: agregar el metodo para cargar imagenes
        $receta = new Receta([
            'titulo'=> $request->get('titulo'),
            'imagen'=> self::IMAGEN_DEFAULT,
            'preparacion'=> $request->get('preparacion'),
            'fk_autor'=> $request->get('fk_autor'),
            'categoria'=> $request->get('categoria'),
            'dificultad'=> $request->get('dificultad'),
            'tiempo_preparacion'=> $request->get('tiempo_preparacion'),
        ]);

        if($receta->save()){
            return redirect()->route('panel.index');
        }else{
            return redirect()->route('panel.agregarReceta');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $receta = Receta::find($id);
        }catch (\Exception $exception){
            Log::alert($exception->getMessage());
        }

        if($receta->delete()){
            return redirect()->route('panel.index');
        }else
            return redirect()->route('web.index');
    }
}
