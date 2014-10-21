@extends ('layout')
@section('title') Lista de Productos @stop

@section('content')


<!-- Latest compiled and minified CSS -->


<h2>
Lista de Productos
</h2>



@if (Auth::id()==1)
<p><a href="/products/create" class="btn btn-primary">Create</a></p>
@endif


<div id="col_1">


      <h2>Busqueda</h2>

      <input type="text" id ="search" class="form">

        <h2><a href="/products">Todos</a></h2>

        <h2>Tipo</h2>

        @foreach ($products as $user)

           <li class="cli">{{$user->tipo}}</li>

        @endforeach

        <h2>Caracteristica</h2>

        @foreach ($products as $user)

            <li class="cli">{{$user->caracteristica}}</li>

        @endforeach


</div>

<div id="col_2">

 


     @foreach ($products as $user)


 

  <li  class="col_2_article_1">
       

        <a href="/products/{{$user->id}}"><img src="{{$user->imagen}}" class="fade" height="300" width="300"></a>
        <h3>{{$user->tipo}}</h3>
        <h3>{{$user->caracteristica}}</h3>


                
@if (Auth::id()==1)


        <a href="/products/{{$user->id}}/edit"  role="button">Editar</a>
       
        <a href="/products/{{$user->id}}"  role="button">Ver detalles</a>
        <a href="/add_user_producto/{{$user->id}}"  role="button">Me gusta</a>
       {{Form::open(array('method'=>'delete','route'=>['products.destroy',$user->id]))}} 
        <a><button type="submit">Delete</button></a>
        {{Form::close()}}
@else

<div id ="details">
<a href="/products/{{$user->id}}"  role="button">Ver detalles</a>
<a href="/products/{{$user->id}}"><p>☺</p></a>
</div>

<div id="details">
<a href="/add_user_producto/{{$user->id}}"  role="button">Me gusta</a>
<a href="/add_user_producto/{{$user->id}}"><p>♥</p></a>
</div>

@endif 


       
    
  
       
      	
</li>


@endforeach



</div>

 <script src="//code.jquery.com/jquery-1.10.2.js"></script>


 
<script>
$(document).ready(function(){
$( ".cli" ).click(function() {

  var val = $(this).text().toLowerCase();
console.log(val);


$(".col_2_article_1").hide();
       $(".col_2_article_1").each(function()
      {

      var text= $(this).text().toLowerCase();
      console.log(text);

        if (text.match(val))
      {
        $(this).show();
       
      } 

       });

});

});
</script>



<script type="text/javascript">
 
$(document).ready(function(){

  $("#search").keyup(function()
  {

    var val = $(this).val().toLowerCase();

   /*caracter  por caracter val*/
   console.log(val);

    $(".col_2_article_1").hide();

      $(".col_2_article_1").each(function()
      {

      var text= $(this).text().toLowerCase();

      /*muestra todos text*/
      

      if (text.indexOf(val)!=-1)
      {
        $(this).show();
       
      }

       });

  });

});

</script>



@stop