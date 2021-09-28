@extends('admin.layouts.app')

@section('title', 'Listagem de Posts')

@section('content')

        <a href="{{route('posts.create')}}" class="">criar novo post</a>
        <hr>

        @if (session ('message'))

                <div>

                    {{ session ('message')}}

                </div>

        @endif

        <form action="{{route('posts.search')}}" method="post">

            @csrf

            <input type="text" name="search" placeholder="Pesquisa">

            <button type="submit">Enviar</button>

            </form>

        <h1>Posts</h1>

        @foreach ($posts as $post )

            <p>
                {{ $post -> title }}

                [<a href="{{route ('posts.show',$post->id)}}">Ver detalhes</a> |
                <a href="{{route ('posts.edit',$post->id)}}">Editar</a>

                ]

            </p>

        @endforeach


        <hr>

        @if (isset($filters))

            {{ $posts->appends($filters)->links()}}

        @else

            {{$posts->links()}}

        @endif



@endsection
