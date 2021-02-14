@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
    
            <!--Aqui se van a enlistar las imagenes-->
            <!--Recorriendo las imagenes-->
            @foreach ($images as $image)
                
                <div class="card pub_image">
                    <div class="card-header">
                        <!--Avatar del usuario que subio-->
                        <img src="{{ route('user.avatar' , ['filename'=> $image->user->image ]) }}" class="avatar">
                        
                        <!--Nombre del usuario que subio la foto-->
                        {{$image->user->name.' '.$image->user->surname.' '}}
                        <!--Nombre de usuario-->
                        <span class="text_image_nick">| {{'@'.$image->user->nick}}</span>

                        <span class="text_image_date">
                            {{ \FormatTime::LongTimeFilter($image->created_at) }}
                        </span>
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

            @endforeach

        </div>

        
        

    </div>

    <!--Pagination (links metodo predeterminado de 
    laravel , mirar el controlador la funcion de paginacion)-->  
    <div class="pagination">
        {{$images->links()}}
    </div>
    


</div>




@endsection
