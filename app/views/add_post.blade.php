@extends ('layout')
@section('title') Estado @stop

@section('content')
<h2>
{{$id_user->username}}
</h2>

<div id="col_1">
  <img src="{{$id_user->photo}}" width ="200px" height="250px">
 </div>

 <div id="col_2">
 <div id= "post">
<h3>
Actualizar estado
</h3>
 {{ Form::open(array('action' => 'PostsController@store')) }}

	<!--<li><input class="form" id="title" placeholder="title" type ="text" name ="title"></li>-->
	<li><input class="form" id="content" placeholder="Que estas pensando?" type ="content" name ="content"></li>
	
{{Form::button('Publicar',array('type'=>'submit','class'=>'form-login')) }}

{{ Form::close() }}

</div>


@foreach ($id_user->posts as $posts)

 <div id="post">
     <h3>{{$posts->id}}</h3>
        <p>{{$posts->title}}</p>
        <p>{{$posts->content}}</p>
   </div>    
 @endforeach




 </div>

 <div id="col_3">
 Personas que quizas conozcas

 </div>



</div>

@stop