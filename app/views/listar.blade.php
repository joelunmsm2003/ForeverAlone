@extends ('layout')
@section('title') Lista de Users @stop

@section('content')



<h2>Listar</h2>


@foreach ($files as $file)


         <img src="/assets/img/{{substr($file, 43, 20)}}" height="100" width="100"  alt="...">
        

@endforeach


@stop


