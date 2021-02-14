<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Esta la necesitamos para enviar archivos a la vista
use Illuminate\Http\Response;
//Dependencias para la subida de archivos
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UserController extends Controller{

    public function __construct(){
        //Midleware de atuenticacion
        $this->middleware('auth');
    }

    public function config(){
        return view('user.config');
    }

    /*=============================================================================*/
    /*Metodo Actualizar usuario*/
    public function update(Request $req){

        
        //Datos actuales del usuario loggeado
        $user = \Auth::user();
        $id = $user->id;

        
        /*Validar los campos*/
        $validate = $this->validate($req , [
            'name' => 'required|string|max:100',
            'surname' => 'required|string|max:200',
            //propiedad unica (solo permitiendo que sea igual al nick del usuario)
            'nick' => 'required|string|max:100|unique:users,nick,'.$id,
            //email
            'email' => 'required|email|max:255|unique:users,email,'.$id,
        ]);
        

        

        /*Recoger los datos del formulario*/
        $name = $req->input('name');
        $surname = $req->input('surname');
        $nick = $req->input('nick');
        $email = $req->input('email');



        //Asignar nuevos valores en la base de datos
        $user->name = $name;
        $user->surname = $surname;
        $user->nick = $nick;
        $user->email = $email;
        

        echo $nick;

        //Recibir imagen
        $image = $req->file('image');
        if($image){
            //Creamos un nombre para la imagen (en este caso tiempo + nombre de usuario)
            $image_path = time().$user->nick.".jpg";

            //Guardar el archivo en el servidor especificando el disco a guardar
            Storage::disk('users')->put($image_path , File::get($image) );

            //Guardar el dato del path en la base de datos
            $user->image = $image_path;
        }

        $user->update();

        //Retornar alguna ruta (utilizando el name de la ruta)
        return redirect()->route('config')
            /*Esto creara una session llamada message que 
            podremos detectarla con la vista */
            ->with(['message'=>'Usuario actualizado']);
    }
    /*=============================================================================*/

    /*=============================================================================*/
    //Metodo para mostrar el avatar
    public function getImage($filename){
        $file = Storage::disk('users')->get($filename);
        return new Response($file , 200);
    }
    /*=============================================================================*/

    

}
