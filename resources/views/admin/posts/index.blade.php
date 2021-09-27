
<a href="{{route('posts.create')}}" class="">criar novo post</a>
<hr>

<h1>Posts</h1>

@foreach ($posts as $post )

    <p>
        {{ $post -> title }}[<a href="{{route ('posts.show',$post->id)}}">Ver detalhes</a> ]

    </p>

    @endforeach
