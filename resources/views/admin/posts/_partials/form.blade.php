@if ($errors->any())

    <ul>
        @foreach ($errors->all() as $error )

            <li>{{$error}}</li>

        @endforeach
    </ul>

@endif

    @csrf
    <input type="text" name="title" id="title" placeholder="Titulo" value="{{ $post->title }}">
    <textarea name="content" id="content" cols="30" rows="4" placeholder="Conteudo">{{ $post->content }}</textarea>
    <button type="submit">Enviar</button>
