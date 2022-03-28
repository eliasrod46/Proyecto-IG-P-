<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

USE App\Image;



Route::get('/', function () {

    //prueba de ORM elocuent

    //saco todos los registros de la tabla images
    $images = Image::all();

    foreach($images as $image){
       
        //Datos de la imagen
        echo 'image_path: '.$image->image_path.'<br>';
        echo 'description: '.$image->description.'<br>';
        //datos del usuario que subio la img
        echo 'nombre de usuario: '.$image->user->nick.'<br>';
        echo '<strong>Comentarios</strong><br>';

        //cometarios a la img
        if(count($image->comments) >=1){

            foreach($image->comments as $comment){
                echo $comment->user->nick.': '.$comment->content.'<br>';
    
            }
        }else{
            echo 'La imagen no tiene comentarios<br>';

        }
        
        //likes de la imagen
        echo 'Likes: '.count($image->likes);


        echo '<hr>';

    }
    die();


    return view('welcome');
});

