<!--Enlace para ir a una pagina donde la imagen se ve en grande junto con los comentarios-->
<a href="{{route('image.detail' , ['id'=>$image->id])}}">
    <!--Imagen-->
    <img src="{{ route('image.print' , ['filename'=> $image->image_path ]) }}" class="card-img-top">
</a>

