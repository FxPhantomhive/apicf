<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use DB;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuarios::all();
        return $usuarios;
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
    public function store(Request $request)
    {
        $usuario = new Usuarios();

        $usuario->username = $request->username;
        $usuario->email = $request->email;
        $usuario->password = $request->password;
        $usuario->perfiles = 1;        
        $usuario->imagen = "img/periles/perfil.jpg";
        $usuario->idRol = 2;
        $usuario->idPlanes = $request->idPlanes;        
        /*$usuario->username = $request->input('username');
        $usuario->email = $request->input('email');
        $usuario->password = $request->input('password');
        $usuario->perfiles = 1;        
        $usuario->imagen = "img/periles/perfil.jpg";
        $usuario->idRol = 2;
        $usuario->idPlanes = $request->input('idPlanes');*/

        $usuario ->save();

        $usuarioR = DB::table('usuarios')->orderBy('idUsuarios', 'desc')->first();
        return $usuarioR;
        
    }

    public function loginf(Request $request)
    {
        $usuario = new Usuarios();

        /*$usuario->username = $request->username;
        $usuario->email = $request->email;
        $usuario->password = $request->password;*/

        $usuario = DB::table('usuarios')->where('username','=',$request->username)->Where('password','=',$request->password)->get();

        if($usuario == '[]')
        {
            return response()->json($usuario, 400);
        }else{
            return response()->json($usuario, 200);
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
        //
    }

    public function login($user,$pass)
    {
        $usuario = DB::table('usuarios')->where('username','=',$user)->Where('password','=',$pass)->get();

        if($usuario == '[]')
        {
            return response()->json(['Mensaje'=>'Registro no encontrado']);;
        }else{
            return $usuario;
        }
    }
}
