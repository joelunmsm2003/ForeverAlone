@extends ('layout')

@section('title') Admin @stop

@section('content')

{{ Auth::User()->email; }} 