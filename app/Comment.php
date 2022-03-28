<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    //Usuario - Many to One
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    //Image - Many to One
    public function image(){
        return $this->belongsTo('App\Image', 'image_id');
    }


}
