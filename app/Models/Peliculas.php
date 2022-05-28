<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peliculas extends Model
{
    /*use HasFactory;*/

    public $timestamps = false;
    protected $fillable = ['idPeliculas','nombre','anioEstreno','categoriaEdad','descripcion','calidad','director','banner','idGeneros','Pelicula'];
    protected $primaryKey = 'idPeliculas';
}
