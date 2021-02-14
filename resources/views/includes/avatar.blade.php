<!--Avatar-->
<!--El metodo route(nombre de la ruta , param)-->
<img src="{{ route('user.avatar' , ['filename'=> Auth::user()->image ]) }}" class="avatar">

