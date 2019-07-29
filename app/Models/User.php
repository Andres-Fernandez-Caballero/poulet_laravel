<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;

class User extends Authenticatable
{
    use Notifiable;
    private const IMG_DEFAULT = 'quemada.jpg';
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

        $avatar = $this->attributes['img'] ;

            if(!Storage::disk('local')->exists($avatar)){
                $url = 'imagenes/medium/'.self::IMG_DEFAULT;
            }else{
                $url = url('imagenes/medium/app/'.$this->attributes['img']);
            }

        return $url;
    }

    public function isAdmin(){
        $validate = false;
        if(Auth::check())
        {
            if(($this->getAttribute('rol') == 'admin')||($this->getAttribute('rol') == 'master')){
                $validate = true;
            }
        }
        return $validate;
    }

    public function isMaster(){
        $validate = false;
        if(Auth::check())
        {
            if(($this->getAttribute('rol') == 'master')){
                $validate = true;
            }
        }
        return $validate;
    }
}
