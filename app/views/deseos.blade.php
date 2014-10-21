@extends ('layout')
@section('title') Lista de Productos @stop

@section('content')

<h2>
Esta es tu Lista de Deseos
</h2>


@foreach ($id_user->products as $products)
 <li  class="col_2_article_1">
 
     <h3>{{$products->tipo}}</h3>
        <p>{{$products->caracteristica}}</p>
      
   <a href="/products/{{$products->id}}"><img src="{{$products->imagen}}" class="logo" height="300" width="300"></a></li>
@endforeach



@stop
