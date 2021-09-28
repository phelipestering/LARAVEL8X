<h1>Editar o Post <strong>{{ $post->title}}</strong></h1>






<form action="{{route ('posts.update',$post->id)}}" method="post">

{{-- <input type="text" name="_token" value="{{csrf_token()}}"> --}}


@method('put')

@include('admin.posts._partials.form')


</form>
