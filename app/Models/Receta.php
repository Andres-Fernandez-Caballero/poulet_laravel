<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    public static $LISTA_CATEGORIAS = ['Carnes','Pescados','Pastas','Pollos','Postres'];
    public static $LISTA_DIFICULTADES = ['Facil','Moderado','Dificil','Master Cheft'];
    public static $LISTA_TIEMPOS = ['15','30','45','60','120'];

    protected $table = 'recetas';
    protected $primaryKey = 'id_recetas';
    protected $fillable = ['titulo','imagen','preparacion','categoria','fk_autor','dificultad','tiempo_preparacion'];

}
