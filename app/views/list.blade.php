@extends ('layout')
@section('title') Lista de Users @stop

@section('content')

<h2>
Lista de Usuarios
</h2>
<div class="paginacion">
<table class="table">
<tr>
	<th>Name</th>
	<th>Email</th>
	<th>Deseos</th>
	<th>Editar</th>

</tr>



@foreach ($users as $user)
	<tr>
		<td>
		{{$user->username}}
		</td>
		<td>
			{{$user->email}}
		</td>

		<td>
			<p><a href="/productsuser/{{$user->id}}" >Sus deseos</a></p>
		</td>
		<td>
			<p><a href="/users/{{$user->id}}/edit" >Editar Datos</a></p>
		</td>
	</tr>

@endforeach


  

</table>


</div>

<p><a href="/users/create" >Create</a></p>


@stop