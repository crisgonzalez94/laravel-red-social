<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
//Esta la necesitamos para enviar archivos a la vista
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

//Modelo de Image
use App\Image;

class ImageController extends Controller
{
    public function __construct(){
        //Midleware de atuenticacion
        $this->middleware('auth');
    }

    public function create(){
        return view('image.create');
    }

    public function save(Request $req){

        //Datos del usuario loggeado
        $user = \Auth::user();
        $user_id = $user->id;

        

        $validate = $this->validate($req , [
            'description' => 'required',
            'image_path' => 'required|mimes:jpg,png,gif,jpeg'
        ]);

        //Obtenemos la imagen
        $image = $req->file('image_path');
        if($image){
            //Le damos un nombre a la imagen para que sea unico
            $image_path = time().$user->nick.'.jpg';
            $description = $req->input('description');
            //Guardar imagen
            Storage::disk('images')->put($image_path , File::get($image) );
            //Guardar el path del imagen al usuario
        }
        

        
        
        $image = DB::table('images')->insert(array(
            'user_id' => $user_id,
            'image_path' => $image_path,
            'description' => $description
        ));


        //Retornar alguna ruta (utilizando el name de la ruta)
        return redirect()->route('home')->with([
            'message' => 'La foto ha sido subida correctamente'
        ]);
    }

    /*============================================================================*/
    //Pintar las imagenes del muro
    public function print($filename){
        
        $file = Storage::disk('images')->get($filename);
        return new Response($file , 200);
    }


    //Controla una pagina donde se va a abrir una pagina completa para la imagen
    public function detail($id){

        $image = Image::find($id);

        return view ('image.detail' , [
            'image' => $image
        ]);
    }
    

}