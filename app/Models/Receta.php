<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Receta extends Model
{
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

    public function getImagenMiniatura(){
        $img = 'imagenes/small/quemada.jpg';

        return url($img);
    }



}
