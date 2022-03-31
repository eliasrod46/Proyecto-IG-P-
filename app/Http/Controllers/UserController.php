<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\file;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function config(){
        return view('user.config');
    }

    public function update(Request $request){

        //pendiente funcionalidad del cambio de contraseña

        //Conseguir el usuario identificado 
        $user = \Auth::user();
        $id = $user->id;

        //validacion del formulario
        $validate = $this->validate($request, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'nick' => 'required|string|max:255|unique:users,nick,'.$id,
            'email' => 'required|string|email|max:255|unique:users,email,'.$id
        ]);

        //recoger datos del formulario
        $name = $request->input('name');
        $surname = $request->input('surname');
        $nick = $request->input('nick');
        $email = $request->input('email');
        
        //asiganr nuevos valor al objeto del usuario
        $user->name = $name;
        $user->surname = $surname;
        $user->nick = $nick;
        $user->email = $email;

        //subir la imagen
        $image_path = $request->file('image_path');
        if($image_path){
            //poner nombre unico
            $image_path_name = time().$image_path->getClientOriginalName();
            //Guardo en la carpeta app/users
            Storage::disk('users')->put($image_path_name, File::get($image_path));
            //seteo el nombre de la imagen en el objeto
            $user->image = $image_path_name;
        }
        

        //ejecutar consulta y cambio en la bbdd
        $user->update();


        return redirect()->route('config')
                         ->with(['message' => 'Usuario actualizado correctamente']);
        
    }

    public function getImage($filename){
        //devuelve la imagen en formato crudo(?)
        $file = Storage::disk('users')->get($filename);
        return new Response($file, 200);
    }
}
