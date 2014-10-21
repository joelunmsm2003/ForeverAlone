@extends ('layout')
@section('title') 

@if (Auth::check())
{{Auth::user()->username}}

@endif

@stop

@section('content')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
      <link href="http://fonts.googleapis.com/css?family=Dosis" type="text/css" rel="stylesheet" /> 
<h1>Registrarse</h1>
 



<div id="regis_cont">
{{ Form::open(array('action' => 'UsersController@store')) }}

   

	<li><input class="form" id="username" placeholder="Nombre" type ="text" name ="username"></li>
	<li>{{$errors->first('username')}}<br></li>
 
	<li><input class="form" id="email" placeholder="Email" type ="text" name ="email"></li>
	 <li>{{$errors->first('email')}}<br></li>
  

	<li><input class="form" id="password" placeholder="Contraseña" type ="password" name ="password"></li>
	<li>{{$errors->first('password')}}<br></li>
	

{{Form::button('Registrar',array('type'=>'submit','class'=>'form-login')) }}

{{ Form::close() }}

</div>

{{ Form::close() }}
@stop