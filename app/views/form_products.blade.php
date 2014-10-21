@extends ('layout')
@section('title') Products @stop

@section('content')

<div id="col_1_cp">



<h2>Create Products</h2>
 
{{ Form::open(array('action' => 'ProductsController@store')) }}


	<li><p>Tipo</p><input class="btn" id="tipo" placeholder="Tipo" type ="text" name ="tipo"></li>
 
	<li><p>Caracteristica</p><input class="btn" id="caracteristica" placeholder="Caracteristica" type ="text" name ="caracteristica"></li>
  <div id="col_1_cp_1">
<li><p>Otros</p><input class="btn" id="deseo"  placeholder="Otros"type ="text" name ="deseo">
</div>
<h2>Imagenes</h2>
	<li><p>A</p><input class="btn" id="imagen" placeholder="Imagen" type ="text" name ="imagen">
	<li><p>B</p><input class="btn" id="imagen_1" placeholder="Imagen" type ="text" name ="imagen_1"></li>
	<li><p>C</p><input class="btn" id="imagen_2" placeholder="Imagen" type ="text" name ="imagen_2"></li>
	<li><p>D</p><input class="btn" id="imagen_3" placeholder="Imagen" type ="text" name ="imagen_3"></li>



<li>{{Form::button('Crear',array('type'=>'submit','class'=>'btn')) }}</li>

{{ Form::close() }}

</div>

<div id="col_2_cp">

<h2>Arrastrar las imagenes a la caja de texto</h2>



{{ Form::open(array('url' => '/fileform','files'=>true)) }}


        {{Form::label('myfile', 'My file') }}
		{{Form::file('myfile',null,array('class'=>'form')) }}

{{ Form::button('Upload',array('type'=>'submit','class'=>'btn')) }}

{{ Form::close() }}


@foreach ($files as $file)

    

         <img src="/assets/img/{{substr($file, 60, 70)}}" height="80" width="80"  alt="...">

        

@endforeach




</div>


@stop