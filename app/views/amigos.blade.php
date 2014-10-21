@extends ('layout')
@section('title') Lista de Users @stop

@section('content')

<h2>
{{Auth::user()->username}} tienes {{count($user->amigos)}} solicitudes enviadas
</h2>


@foreach ($user->amigos as $user)

 <div id="amigos">
        
        <a href="/post/{{$user->id}}" class="selected">{{$user->username}}</a>
        <br>
        <a href="/post/{{$user->id}}" class="selected"><img src="{{$user->photo}}" width ="200px" height="200px"></a>

 </div>

   @endforeach



@stop




