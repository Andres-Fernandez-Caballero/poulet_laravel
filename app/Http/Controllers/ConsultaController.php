<?php

namespace App\Http\Controllers;

use App\Consulta;
use App\Http\Requests\ContactoRequest;
use App\Models\Receta;
use Doctrine\DBAL\Driver\Mysqli\MysqliException;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header = ['fondo' => 'poulet-header', 'titulo' => 'Detalles de Consulta'];
        try {
            $lista_consulta = Consulta::all();
        } catch (MysqliException $mysqliException) {
            //TODO: manejar la exepcion
            return redirect()->route('web.index');
        }

        return view('panel.consultas')
            ->with('header', $header)
            ->with('consultas', $lista_consulta);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $header = ['fondo' => 'poulet-header', 'titulo' => 'Consulta'];
        $categorias = Receta::$LISTA_CATEGORIAS;
        return view('formularios.contacto')
            ->with('header', $header)
            ->with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactoRequest $request)
    {
        $data = $request->all();
        $listaItems = '';
        if (isset($request['boxs'])) {
            foreach ($request['boxs'] as $item) {
                $listaItems = $listaItems . $item . ' ';
            }
        }
        $data['sugerencias'] = $listaItems;
        $consulta = new Consulta($data);
        if ($consulta->save()) {
            return redirect()->route('contacto.create')->with('success', 'Consulta enviada gracias');
        } else {
            return redirect()->route('contacto.create')->with('error', 'No se pudo enviar la consulta');
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
        $header = ['fondo' => 'poulet-header', 'titulo' => 'Detalles de Consulta'];
        try {
            $consulta = Consulta::find($id);
        } catch (MysqliException $mysqliException) {
            //TODO: manejar exepcion
            return redirect()->route('web.index');
        }
        return view('panel.consulta')
            ->with('header', $header)
            ->with('consulta', $consulta);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // No lo necesito por ahora
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $consulta = Consulta::find($id);
        } catch (MysqliException $mysqliException) {
            //TODO: manejar exepcion
            return redirect()->route('web.index');
        }

        if ($consulta->update(['revisado' => $request['revisado']])) {
            return redirect()->route('contacto.index')->with('success', 'Receta actualizada');
        } else {
            return redirect()->route('contacto.index')->with('error', 'La Receta no se actualizo');
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
            $consulta = Consulta::find($id);
        } catch (MysqliException $mysqliException) {
            //TODO: manejar exepcion
            return redirect()->route('web.index');
        }
        if ($consulta->delete()) {
            return redirect()->back()->with('success', 'Consulta eliminada');
        } else {
            return redirect()->route('contacto.index')->with('error', 'Error al eliminar');
        }
    }
}
