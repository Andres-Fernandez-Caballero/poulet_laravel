<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    private const IMG_DEFAULT = 'img/quemada.jpg';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','img','rol'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getUserImgAttribute(){

        /* al crear la base de datos se establece la imagen como null
         y luego el usuario elije una propia */

        if($this->attributes['img']== 'null'){
            $img = self::IMG_DEFAULT;
        }else{
            $img = $this->attributes['img'];
        }
        return $img;
    }
}
