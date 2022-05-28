<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peliculas;
use DB;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peliculas = Peliculas::all();
        return $peliculas;
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
        $pelicula = new Pelicula();
        $pelicula->nombre = $request->nombre;
        $pelicula->anioEstreno = $request->anioEstreno;
        $pelicula->categoriaEdad = $request->categoriaEdad;
        $pelicula->descripcion = $request->descripcion;
        $pelicula->calidad = $request->calidad;
        $pelicula->director = $request->director;
        $pelicula->banner = $request->banner;
        $pelicula->idGeneros= $request->idGeneros;
        $pelicula->Pelicula = $request->Pelicula;

        $pelicula->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idPeliculas)
    {
        $peliculas = Peliculas::find($idPeliculas);
        
        if(is_null($peliculas)){
            return response()->json(['Mensaje'=>'Registro no encontrado']);
        }else{
            return response()->json($peliculas::find($idPeliculas),200);
        }
        
    }

    public function searchMovie($peli)
    {
        $termino = '%'.$peli.'%';
        $pelicula = DB::table('peliculas')->where('nombre','Like',$termino)->get();

        if($pelicula == '[]')
        {
            return response()->json(['Mensaje'=>'Registro de pelicula no encontrado']);;
        }else{
            return $pelicula;
        }
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
    public function update(Request $request)
    {
        $pelicula = Pelicula::findOrFail($request);
        $pelicula->nombre = $request->nombre;
        $pelicula->anioEstreno = $request->anioEstreno;
        $pelicula->categoriaEdad = $request->categoriaEdad;
        $pelicula->descripcion = $request->descripcion;
        $pelicula->calidad = $request->calidad;
        $pelicula->director = $request->director;
        $pelicula->banner = $request->banner;
        $pelicula->idGeneros= $request->idGeneros;
        $pelicula->Pelicula = $request->Pelicula;

        $pelicula->save();
        return $pelicula;
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
}
