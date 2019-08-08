<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Receta extends Model
{
    private const STORE_AUTORES_PATH = 'recetas/';
    public static $LISTA_CATEGORIAS = ['Carnes','Pescados','Pastas','Pollos','Postres'];
    public static $LISTA_DIFICULTADES = ['Facil','Moderado','Dificil','Master Cheft'];
    public static $LISTA_TIEMPOS = ['30','45','60','120'];

    protected $table = 'recetas';
    protected $primaryKey = 'id_recetas';
    protected $fillable = ['titulo','imagen','preparacion','categoria','fk_autor','dificultad','tiempo_preparacion'];

    public function getRecetaImgAttribute(){
        $img = 'imagenes/medium/quemada.jpg';
            if(Storage::disk('local')->exists($this->attributes['imagen'])){
               $img =  'imagenes/medium/app/'.$this->attributes['imagen'];
            }
        return url($img);
    }

    /*** no implementado ***/
    public function getImagenGrande(){
        $img = 'imagenes/large/quemada.jpg';
        if(Storage::disk('local')->exists($this->attributes['imagen'])){
            $img =  'imagenes/large/app/'.$this->attributes['imagen'];
        }
        return url($img);
    }

    public function getCarpetaImg(){
        $carpeta = null;
        if (isset($this->attributes['id_recetas'])){
            $nombreUnico = md5($this->attributes['id_recetas']);
            $carpeta = self::STORE_AUTORES_PATH . $nombreUnico;
        }
        return $carpeta;
    }



}
