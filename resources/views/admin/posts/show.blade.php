<h1>Detalhes do Post {{ $post ->title }}</h1>

<ul>
    <li><strong>Titulo: </strong>{{ $post ->title}}</li>
    <li><strong>Conteudo: </strong>{{ $post ->content}}</li>
</ul>

<form action="" method="post">

    <button type="submit">Deletar o Post {{ $post ->title}}</button>

</form>
