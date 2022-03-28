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
        //indicamos con que objeto queremos que tabaje
        //mediante el id de la imagen que hay guardado en la tabla de comentarios
        //devuelve todos los comantarios que tenga la id de esa imagen
        //Devuelve un array de objeos quecoindican con el id de la imagen
        //(todo esto lo hace laravel solo)

        return $this->hasMany('App/Comment');
    }


    //Likes
    //relación One To Many /  Uno a Muchos
    //una sola imagen puede tener muchos likes
    public function likes(){
        //indicamos con que objeto queremos que tabaje
        //mediante el id de la imagen que hay guardado en la tabla de comentarios
        //devuelve todos los likes que tenga la id de esa imagen
        //Devuelve un array de objeos quecoindican con el id de la imagen
        //(todo esto lo hace laravel solo)
        return $this->hasMany('App/Like');
    }

    //usuario
    //relación Many To One /  Muchos a Uno
    //Muchas Imagenes pueden tener un unico posteador(usuario)
    public function user(){
        //indicamos con que objeto queremos que tabaje
        //mediante el user_id de la imagen que hay tabla de imagenes
        //devuelve el objeto usuario que posteo la foto
        //(todo esto lo hace laravel solo)
        return $this->belongsTo('App/User', 'user_id');
    }
}
