<!DOCTYPE html>
<html>

	<head>

	<title>@yield('title','Aprendiendo')</title>

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="http://fonts.googleapis.com/css?family=Open Sans" type="text/css" rel="stylesheet" /> 
<link rel="icon" type="http://ecoaventuravida.com/assets/img/22236.png" href="http://ecoaventuravida.com/assets/img/22236.png" />


     
        {{ HTML::style('assets/css/style.css') }}
        {{ HTML::style('assets/js/filters.js') }}
        {{ HTML::style('assets/js/controllers.js') }}
        {{ HTML::style('assets/js/app.js') }}




     </head>

<body>

<header>
@if (Auth::check())
<h1><a href="/post/{{Auth::id()}}">Red Social  </a></h1>
@else
<h1><a href="/login">Red Social  </a></h1>
@endif

<div id="top-nav">
<nav>

<div id="top-menu">
      <ul class="nav">
           
            


           @if (Auth::check())
            <!--<li><a href="/products" class="selected">La Galeria de Cosas</a></li>
            
            <li><a href="/map" class="selected">Donde Estamos</a></li>
            <li><a href="/productsuser/{{Auth::id()}}" class="selected">Mi Lista de Deseos</a></li>-->

            <li><a href="/noticias" class="selected">Noticias</a></li>
        
            <li><a href="/users/{{Auth::id()}}" class="selected">Informacion</a></li>
            <li><a href="/amigos/{{Auth::id()}}" class="selected">Amigos</a></li> 
           

            <li><a href="/post/{{Auth::id()}}" class="selected">{{Auth::user()->username}}</a></li> 
            <li><a href=""><span class="glyphicon glyphicon-comment"></span></a></li>
          

            <li><a href=""><span class="glyphicon glyphicon-globe" ></span></a>

                 <ul id='glob'>
              
             
            </ul>

            </li>

          

            <li><a href=""><span class="glyphicon glyphicon-cog"></span></a>
         <ul>
            <li><a href="/logout" class="selected" >Salir</a></li>
              <li><a href="/logout" class="selected">Help</a></li>
         </ul>
             
            </li>
           
               @if (Auth::id()==1)

            <!--<li><a href="/users/" class="selected">Lista de Usuarios</a></li>
               <li><a href="/files" class="selected">Subir Imagenes</a></li>-->
            @endif    
            @endif
                  
             
       </ul>
</div>

</nav>



</div>

</header>


<section id="contenido">
      
@yield('content') 




    
</section>






    </body>
</html>