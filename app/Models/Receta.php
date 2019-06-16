<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $table = 'recetas';
    protected $primaryKey = 'id_recetas';
    protected $fillable = ['titulo','imagen','preparacion','categoria','fk_autor'];
}
