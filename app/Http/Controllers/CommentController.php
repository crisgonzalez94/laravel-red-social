<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller{




    //Funcion para comentar
    public function create(Request $req){

        $current_date = date('Y-m-d H:i:s');

        //Obtener el id de la imagen a comentar
        $image_id = $req->input('image_id');
        //id del usuario loggeado
        $user_id = $req->input('user_id');
        //comentario
        $content = $req->input('content');

        //Validar comentario
        $validate = $this->validate($req , [
            'image_id' => 'required | integer',
            'content' => 'required | string | min:1 '
        ]);

        $save = DB::table('comments')->insert(array(
            'user_id' => $user_id,
            'image_id' => $image_id,
            'content' => $content,
            'created_at' => $current_date
        ));

        //Retornar alguna ruta (utilizando el name de la ruta)
        return redirect()->route('image.detail' , ['id' => $image_id])->with([
            'message' => 'Su comentario se añadio con exito.'
        ]);

    }

    public function delete($comment_id , $image_id){

        echo "comment_id: ".$comment_id."<br>";
        echo "image_id: ".$image_id."<br>";

        $delete = DB::table('comments')->where('id' , '=' , $comment_id )->delete();

        return redirect()->route('image.detail' , ['id' => $image_id])->with([
            'message' => 'Su comentario se borro con exito.'
        ]);
    }

}
