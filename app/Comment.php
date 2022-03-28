<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    //Usuario
    //Relación Many to One / Muchos a Uno
    //Muchos comentarios pueden perteneser a un usuario
    public function user(){
        return $this->belongsTo('App/User', 'user_id');
    }

    //Image
    //Relación Many to One / Muchos a Uno
    //Muchos comentarios pueden perteneser a una imagen
    public function image(){
        return $this->belongsTo('App/Image', 'image_id');
    }


}
