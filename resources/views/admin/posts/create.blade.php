<h1>Cadastrar Novo Post</h1>

@if ($errors->any())

    <ul>
        @foreach ($errors->all() as $error )

            <li>{{$error}}</li>

        @endforeach
    </ul>


@endif

<form action="{{route ('posts.store')}}" method="post">

{{-- <input type="text" name="_token" value="{{csrf_token()}}"> --}}

@csrf
    <input type="text" name="title" id="title" placeholder="Titulo" value="{{ old ('title')}}">
    <textarea name="content" id="content" cols="30" rows="4" placeholder="Conteudo">{{ old ('content')}}</textarea>
    <button type="submit">Enviar</button>

</form>
