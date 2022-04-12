<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Comment;

class CommentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function store(Request $request){
        
        //valicacion
        $validate = $this->validate($request, [
            'image_id' => 'integer|required',
            'content' => 'string|required'

        ]);
        
        //guardo informacion
        $user = \Auth::user();
        $image_id = $request->input('image_id');
        $content = $request->input('content');

        //creo un nuevio objeto con mis datos
        $comment = new Comment();

        $comment->user_id = $user->id;
        $comment->image_id = $image_id;
        $comment->content = $content;

        //Guarda en bbdd
        $comment->save();

        //redireccion

        return redirect()->route('image.detail', ['id' => $image_id])
                         ->with([
                             'message' => 'Has publicado tu comentario correctamente'
                         ]);
    }

    public function delete($id){
        //conseguir datos del usuario identificado
        $user = \Auth::user();
        
        //conseguir objeto dle comentario
        $comment = Comment::find($id);

        //comporbar si soy el dueño del comentario o de la publicacion
        if($user && (($comment->user_id == $user->id) || ($comment->image->user_id == $user->id))){
            $comment->delete();
            return redirect()->route('image.detail',['id' => $comment->image->id])->with([
                'message' => 'Comentario eliminado correctamente'
            ]);
        }else{
            return redirect()->route('image.detail',['id' => $comment->image->id])->with([
                'message' => 'El comentario no se ha eliminado'
            ]);
        }   
    }
}
