@extends ('layout')
@section('title') Edit Usuario @stop

@section('content')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
      <link href="http://fonts.googleapis.com/css?family=Dosis" type="text/css" rel="stylesheet" /> 
<p>
	Nombre: {{$user->username}}
</p>

<h2>Editar</h2>
 
{{ Form::open(array('action' => array('UsersController@update', $user->id),'method'=>'PUT' )) }}

    <li><input class="form" id="photo" placeholder="Foto" type ="text" name ="photo" value="{{$user->photo}}"></li>
 	
	<li><input class="form" id="username" placeholder="Nombre" type ="text" name ="username" value="{{$user->username}}"></li>
 	<li><input class="form" id="email" placeholder="Email" type ="text" name ="email" value="{{$user->email}}"></li>
 	<li><input class="form" id="password" placeholder="Password" type ="password" name ="password"  value="{{$user->password}}"></li>
 

<li>{{Form::button('Actualizar',array('type'=>'submit','class'=>'form-login')) }}</li>

{{ Form::close() }}



<p><a href="/users/{{$user->id}}" class="btn btn-primary">Return</a></p>
@stop