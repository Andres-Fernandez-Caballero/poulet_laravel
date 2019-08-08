<?php

namespace App\Http\Controllers;

use App\User;
use Doctrine\DBAL\Driver\Mysqli\MysqliException;
use Faker\Provider\File;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header = ['fondo' => 'poulet-header', 'titulo' => 'Lista Usuarios'];
        try {
            $usuarios = User::all();
        } catch (MysqliException $mysqliException) {
            //TODO: manejar exepcion
            return redirect()->route('web.index');
        }

        $roles = User::ROLES;

        return view('panel.usuarios')
            ->with('header', $header)
            ->with('roles',$roles)
            ->with('usuarios', $usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //uso la plantilla laravel
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // uso el provisto por laravel
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $usuario = User::find($id);

        }catch (MysqliException $mysqliException){
            //TODO: manejar exepcion
            return redirect()->route('web.index')->withErrors('Error de mysql');
        }

        return view('panel.usuario_detail')
            ->with('usuario',$usuario);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // no es necesario
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
        try{
            $user = User::find($id);
        }catch (MysqliException $mysqliException){
            //TODO:manejar exepcion
            return redirect()->route('web.index');
        }

        if($user->update([
                'rol'=>$request['rol'],
            ])){
            return redirect()->route('users.index')->with('success','Rol actualizado');
        }else{
            return redirect()->route('users.index')->with('error','rol no actualizado');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illumina
     * te\Http\Response
     */
    public function destroy($id)
    {
        try {
            $usuario = User::find($id);
        } catch (\Exception $exception) {
            //TODO: agregar manejo de error a esto
            return redirect()->route('web.index');
        }

        if ($usuario->delete()) {
            Storage::disk('local')->deleteDirectory('user/' . md5($usuario->email));
            return redirect()->route('web.index')->with('success','Usuario Eliminado');
        } else
            return redirect()->route('panel.index')
                ->with('error','error al eliminar usuario');
    }

    public function updatePass(Request $request, $id)
    {
        // recupero el usuario
        $usuario = User::find($id);

        $validatedData = $request->validate([
            'pass_anterior' => 'required',
            'pass_nuevo' => 'required',
            'pass_confirm' => 'required',
        ]);

        // comparo con el pass en la base de datos
        if (!(Hash::check($request->get('pass_anterior'), $usuario->password))) {
            // si no coinciden envio un mensaje de error
            return redirect()->back()->with("error", "Your current password does not matches with the password you provided. Please try again.");
        }
        // comparo los los campos nuevos de las contraseñas y deben coincidir
        if (!strcmp($request->get('pass_nuevo'), $request->get('pass_confirm')) == 0) {
            return redirect()->back()->with("error", "las contraseñas no coinciden");
        }

        $usuario->fill([
            'password' => Hash::make($request->get('pass_nuevo'))
        ])->save();
        return redirect()->back()
            ->with("success", "password actualizado");
    }

    public function updateImg(Request $request, $id)
    {
        $user = User::find($id);
        $nombreCarpeta = 'users/' . md5($user->email);
        $avatar = $user->img;

        //si la request tiene una imagen la almaceno
        if ($request->hasFile('img_nueva')) {
            $request->file('img_nueva')->store($nombreCarpeta);

            // leo el avatar del usuario si existe lo elimino
            if (Storage::disk('local')->exists($avatar)) {
                Storage::disk('local')->delete($avatar);
            }
        }

        //almaceno el nuevo avatar
        $avatar = Storage::files($nombreCarpeta)[0];

        $user->fill([
            'img' => $avatar
        ])->save();

        return redirect()->home()->with('success','imagen de perfil actualizada');
    }

    public function updateName(Request $request, $id)
    {
        $nuevo_nombre = $request->get('nombre_nuevo');

        $user = User::find($id);

        if (!strcmp($nuevo_nombre, "") == 0) {
            $user->fill([
                'name' => $nuevo_nombre
            ])->save();
        }

        return redirect()->home()->with('success','nombre cambiado');
    }


}
