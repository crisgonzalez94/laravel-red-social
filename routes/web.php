<?php

use App\Image;
//Importar controlladores
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CommentController;

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Rutas para editar usuario
Route::get('/configuracion' , [UserController::class , 'config'])->name('config');
Route::post('/user/edit' , [UserController::class , 'update'])->name('user.update');
//Ruta para cargar el avatar
Route::get('/user/avatar/{filename}', [UserController::class , 'getImage'])->name('user.avatar');
//Ruta para administrar las imagenes
Route::get('/image/create' , [ImageController::class , 'create'])->name('image.create');
Route::post('/image/save' , [ImageController::class , 'save'])->name('image.save');

//Rutas para cargar las imagenes en el muro
Route::get('image/print/{filename}' , [ImageController::class , 'print'])->name('image.print');

//Ruta para abrir la pagina detallada de la imagen
Route::get('image/detail/{id}' , [ImageController::class , 'detail'])->name('image.detail');

//Ruta para comentar
Route::post('comment/create' , [CommentController::class , 'create'])->name('comment.create');
Route::get('comment/delete/{id}' , [CommentController::class , 'create'])->name('comment.delete');