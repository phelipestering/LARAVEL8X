@extends('admin.layouts.app')

@section('content', 'Criar Novo Post')

@section('content')

    <h1>Cadastrar Novo Post</h1>

    <form action="{{route ('posts.store')}}" method="post">

    {{-- <input type="text" name="_token" value="{{csrf_token()}}"> --}}

    @include('admin.posts._partials.form')

</form>

@endsection
