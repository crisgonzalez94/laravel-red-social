<div class="card-body">

    @foreach ($image->comments as $comment)

        <h6>
            <img src=" {{route('user.avatar' , ['filename'=> $comment->user->image])}} " class="avatar" alt="">
            {{$comment->user->name}} | <span class="text_comment_nick">{{'@'.$comment->user->nick}}</span>
        </h6>

        <p>{{$comment->content}}</p>

        <!--Borrar comentario-->
        <!--Si el usuario logeado es el mismo que subio la foto o el que subio el comentario-->
        @if( Auth::user()->id == $image->user_id || $comment->user_id == Auth::user()->id)
            <a href="{{ route('comment.delete' , ['comment_id' => $comment->id , 'image_id' => $image->id ] ) }}">Borrar comentario</a>
        @endif

        <hr>

        

    @endforeach
</div>