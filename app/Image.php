<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //Proteger la base de datos.
    protected $table = 'images';


    //Obtener los comentarios
    public function comments(){
        //Relacion de uno a muchos
        return $this->hasMany('App\Comment');
    }
    //Obtener los likes
    public function likes(){
        //Relacion de uno a muchos
        return $this->hasMany('App\Like');
    }

    //Relacion de muchos a uno
    public function user(){
        return $this->belongsTo('App\User' , 'user_id');
    }

    

}