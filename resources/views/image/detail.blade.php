@extends('layouts.app')


@section('content')
<div class="container">


    <!--Alertas-->
    @include('includes.alerts')

    <div class="card pub_image">

        <div class="card-header">
            <!--Avatar del usuario que subio-->
            <img src="{{ route('user.avatar' , ['filename'=> $image->user->image ]) }}" class="avatar">
            
            <!--Nombre del usuario que subio la foto-->
            {{$image->user->name.' '.$image->user->surname.' '}}
            <!--Nombre de usuario-->
            <span class="text_image_nick">| {{'@'.$image->user->nick}}</span>
        </div>
        
        

        <div class="card-body">
            <!--Imagen-->
            @include('includes.image')

            <!--Descripcion-->
            <p class="text_image_description">{{$image->description}}</p>    

            <div class="row">
                <div class="col-10 col-sm-11 col-md-11 col-lg-11 col-xl-11">
                    <!--Boton de Comentarios-->
                    <a href="" class="btn btn-wr">
                        Comentarios
                        <!--Cantidad de comentarios-->
                        ({{count($image->comments)}})
                    </a>
                </div>
                <div class="col-2 col-sm-1 col-md-1 col-lg-1 col-xl-1">
                    <!--Boton de like-->
                    <img src="{{ asset('img/like-outline.svg') }}" alt="" class="icon-like">
                </div>
            </div>
        </div>
    </div>

    <!--===================================================================================-->
    <!--Comentarios-->
    <div class="card">
        <div class="card-header">
            Comentarios ({{count($image->comments)}})
        </div>

        <div class="card-body">



            
            <!--Formulario de comentario-->
            <form action="{{ route('comment.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!--Id de la imagen-->
                <input type="text" name="image_id" value="{{$image->id}}" hidden>
                <!--Usuario que comenta-->
                <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
                <textarea class="form-control" placeholder="Deja un comentario" id="content" style="height: 100px" name="content"></textarea>
                @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
                <br>
                <!--Submit-->
                <input type="submit" value="Comentar" class="btn btn-primary">
            </form>

            <!--Comentarios que se hicieron-->
            @include('includes.comment')


        </div>
        
    </div>


</div>
@endsection