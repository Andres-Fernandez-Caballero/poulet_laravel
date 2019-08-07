<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Autor extends Model
{
    private const STORE_AUTORES_PATH = 'autores/';
    protected $table = 'autores';
    protected $primaryKey = 'id_autor';
    protected $fillable = ['nombre','apellido','biografia'];

    public function getFullName(){
        return $this.$this->attributes['nombre']. ' '. $this['apellido'];
    }

    public function getAutorImgAttribute(){
        $img = 'imagenes/medium/user_generic.png';
        if(Storage::disk('local')->exists($this->attributes['imagen'])){
            $img =  'imagenes/medium/app/'.$this->attributes['imagen'];
        }
        return url($img);
    }

    public function getCarpetaImg(){
        $carpeta = null;
        if (isset($this->attributes['id_autor'])){
            $nombreUnico = md5($this->attributes['id_autor']);
            $carpeta = self::STORE_AUTORES_PATH . $nombreUnico;
        }
        return $carpeta;
    }
}


