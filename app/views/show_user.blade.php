@extends ('layout')
@section('title') Usuario @stop

@section('content')

<h2>
Usuario {{$user->id}}
</h2>

<p>
	Nombre: {{$user->username}}
</p>

<p>
  Email: {{$user->email}}
</p>

<p>
 

  <img src="{{$user->photo}}" width ="300px" height="300px"><a></a></li>

</p>




<p><a href="/users/{{$user->id}}/edit">Editar</a></p>
@stop

