<?php

namespace App\Http\Controllers;

use App\User;
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
        //
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::find($id);

        return null;
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
        //
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
            $usuario = User::find($id);
        } catch (\Exception $exception) {
            //TODO: agregar manejo de error a esto
        }

        if ($usuario->delete()) {
            return redirect()->route('web.index');
        } else
            return 'error de eliminacion';

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
        return redirect()->back()->with("success", "Your current password does not matches with the password you provided. Please try again.");
    }

    public function updateImg(Request $request, $id)
    {
        $user = User::find($id);
        $nombreCarpeta = md5($user->email);
        $avatar = $user->img;

        $request->file('img_nueva')->store($nombreCarpeta);

        if(Storage::disk('local')->exists($avatar)){
            Storage::disk('local')->delete($avatar);
        }

        $avatar = Storage::files($nombreCarpeta)[0];

        $user->fill([
            'img' => $avatar
        ])->save();

        return redirect()->home();
    }

    public function updateName(Request $request, $id)
    {
        $nuevo_nombre = $request->get('nombre_nuevo');

        $user = User::find($id);

        if(!strcmp($nuevo_nombre,"")==0){
            $user->fill([
                'name'=>$nuevo_nombre
            ])->save();
        }
        return redirect()->home();
    }
}
