<!DOCTYPE html>
<html>

	<head>
	<title>@yield('title','Aprendiendo')</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="http://fonts.googleapis.com/css?family=Architects Daughter" type="text/css" rel="stylesheet" /> 


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
     
        {{ HTML::style('assets/css/style.css') }}
        {{ HTML::style('assets/js/filters.js') }}
        {{ HTML::style('assets/js/controllers.js') }}
        {{ HTML::style('assets/js/app.js') }}




     </head>

<body>

<header>

<h1><a href="/post/{{Auth::id()}}">ForeverAlone</a></h1>
<div id="top-nav">
<nav>

<div id="top-menu">
      <ul class="nav">
           
            

            @if (Auth::check())
             <!--<li><a href="/products" class="selected">La Galeria de Cosas</a></li>
            
            <li><a href="/map" class="selected">Donde Estamos</a></li>
            <li><a href="/productsuser/{{Auth::id()}}" class="selected">Mi Lista de Deseos</a></li>-->
            
            <li><a href="/users/{{Auth::id()}}" class="selected">Bienvenido, {{Auth::user()->username}}</a></li>
            <li><a href="/logout" class="selected">Salir</a></li>

            @if (Auth::id()==1)

            <!--<li><a href="/users/" class="selected">Lista de Usuarios</a></li>
               <li><a href="/files" class="selected">Subir Imagenes</a></li>-->
            @endif
         

            
           
            @else
            <li><a href="/users/create" class="selected">Soy Nuevo, Registrarme</a></li>
                   
            @endif
              

             
       </ul>
</div>

</nav>


<section id="social">
  
     
</section>
</div>

</header>


<section id="contenido">
      
@yield('content') 




    
</section>






    </body>
</html>