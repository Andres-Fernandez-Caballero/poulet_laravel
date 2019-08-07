<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table = 'consultas';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre','apellido','mail','sugerencias','revisado','comentario'];

    public function getRevisado(){
        return ($this->attributes['revisado'])? 'Revisado' : 'Pendiente';
    }
}
