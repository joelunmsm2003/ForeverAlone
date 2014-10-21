@extends ('layout')
@section('title') Create @stop

@section('content')

<h2>Create Usuarios</h2>
 
{{ Form::open(array('route' => 'login')) }}



<div class='row'>
	<div class="form-group col-md-4">
		{{Form::label('email', 'E-Mail Address') }}
		{{Form::text('email',null,array('placeholder'=>'Email','class'=>'form-control')) }}


	</div>


</div>

<div class='row'>
	<div class="form-group col-md-4">
		{{Form::label('username', 'Nombre') }}
		{{Form::text('username',null,array('placeholder'=>'Nombre','class'=>'form-control')) }}
    </div>


</div>

<div class='row'>
	<div class="form-group col-md-4">
		{{Form::label('password', 'Password') }}
		{{Form::text('password',null,array('class'=>'form-control')) }}
    </div>


</div>

<div class='row'>
	<div class="form-group col-md-4">
		{{Form::label('password_confirmation', 'Confirmar contraseña') }}
		{{Form::text('password_confirmation',null,array('class'=>'form-control')) }}
    </div>


</div>

{{Form::button('Crear',array('type'=>'submit','class'=>'btn btn-primary')) }}

{{ Form::close() }}
@stop