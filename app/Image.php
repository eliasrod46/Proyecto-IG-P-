<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Image extends Model
{
    protected $table = 'images';

    //Comentarios
    //relación One To Many /  Uno a Muchos
    //una sola imagen puede tener muchos cometarios
    public function comments(){
        return $this->hasMany('App\Comment')->orderBy('id', 'desc');
    }


    //Likes - One To Many
    public function likes(){

        return $this->hasMany('App\Like');
    }

    //usuario - Many To One
    //Muchas Imagenes pueden tener un unico posteador(usuario)
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
