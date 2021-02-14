<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Importar el modelo de imagenes
use App\Image;
  
class HomeController extends Controller{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */

     
    public function index(){
        //Obtenemos las imagenes de la db

        //Para una carga normal se utiliza el metodo get() 
        //pero como es paginacion usamos paginate(cantidad elem por paginas)
        $images = Image::orderBy('id' , 'desc')->paginate(2);
        
        //Retornamos a la vista enviando las imagenes
        return view('home' , [ 'images' => $images ]);
    }

}