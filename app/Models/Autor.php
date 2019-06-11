<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $table = 'autores';
    protected $fillable = ['nombre','apellid','biografia'];

    public function getNombreCompleto(){
        return $this->attributes['nombre']. ' ' . $this->attributes['apellido'];
    }

    public function setNombreAttribute($nombre){
        $this->attributes['nombre'] = $this->estandarizarNombreOapellido($nombre);
    }

    public function setApellidoAttribute($apellido){
        $this->attributes['apellido'] = $this->estandarizarNombreOapellido($apellido);
    }

    private function estandarizarNombreOapellido($string){
        return ucfirst(strtolower($string));
    }
}
