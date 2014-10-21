<!DOCTYPE html>
<html ng-app="phonecatApp">

	<head>
	<title>@yield('title','Aprendiendo')</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="http://fonts.googleapis.com/css?family=Dosis" type="text/css" rel="stylesheet" /> 


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
     
        {{ HTML::style('assets/css/style.css') }}
        {{ HTML::style('assets/js/filters.js') }}
        {{ HTML::style('assets/js/controllers.js') }}
        {{ HTML::style('assets/js/app.js') }}




     </head>

<body ng-controller="PhoneListCtrl">

<header>

<h1><a href="index.html">Ania Boutique</a></h1>
<div id="top-nav">
<nav>

<div id="top-menu">
      <ul class="nav">
            <li><a href="/products" class="selected">SHOP</a>

                <ul><li><a href="#candy" class="smooth">MAN</a></li>
                    <li><a href="#candy" class="smooth">WOMAN</a></li></ul>

             </li>

            <li><a href="/" class="selected">LOGIN</a></li>
            <li><a href="/" class="selected">SEARCH</a></li>
            <li><a href="/" class="selected">CONTACT</a></li>
            <li><a href="/" class="selected">NEWSLETTER</a></li>
            <li><a href="/" class="selected">WISHLIST</a></li>
            <li><a href="/" class="selected">CART</a></li>
            
       </ul>
</div>

</nav>


<section id="social">
  
        <a href="#" target="_new"><img class="fade" alt="Hard and Soft" src="../assets/img/facebook.png"></a>
        <a href="#" target="_new"><img class="fade" alt="Hard and Soft" src="../assets/img/twitter.png"></a>
        <a href="#" target="_new"><img class="fade" alt="Hard and Soft" src="../assets/img/youtube.png"></a>
        <a href="#" target="_new"><img class="fade" alt="Hard and Soft" src="../assets/img/linkedin.png"></a>

</section>
</div>

</header>


<section id="contenido">
      
@yield('content') 




    
</section>






    </body>
</html>