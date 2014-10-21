@extends ('layout')
@section('title') Bienvenido a Ania @stop
<br>
@section('content')

<script>
  // This is called with the results from from FB.getLoginStatus().

  
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.

      testAPI();


    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Conectate con Facebook';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Iniciar una sesion de Facebook para continuar ';
    
 
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '818903454809467',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.1' // use version 2.1
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.



  function testAPI() {

    
    console.log('Welcome!  Fetching your information.... ');

    FB.api('/me', 
   
    function(response) {
     

     var nom = response.name ;
     var email = response.email;
     var gender = response.gender;
     var link = response.link;
     
     FB.api(
        "/me/picture",
        {
          "redirect": false,
          "height": "200",
          "type": "normal",
          "width": "200"
        },
        function (response) {
        if (response && !response.error) {
        var photo= response.data.url;
        console.log(photo);
        console.log(link);

                   //$('#post').click(function(e){


                  //e.preventDefault();
                  $.post('registra',{username:nom,email:email,gender:gender,link:link,photo:photo},function(data){

                  console.log(data);

                            if(data==='Logeado'){

                            var pagina="/products";
                            location.href=pagina;

                            }

                            if(data==='Logeado-new'){

                             var pagina="/products";
                            location.href=pagina;

                            }

                      });

                  //});

            }
          }
        );


        console.log(response);


        console.log('Successful login for: ' + response.name);
        //document.getElementById('status').innerHTML =
        //Thanks for logging in, ' + response.name + '!';


        document.getElementById('post').innerHTML =
        'Ingresar'

        document.getElementById('nombre').innerHTML =
        'Bienvenida '+ response.name +'!';

    });
  }

      $('#get').click(function(e){

      e.preventDefault();
      $.get('iniciar',function(data){

        console.log(data);

      });

    });

 

</script>



  <!--<button class="btn btn-2 btn-2a" href="#" id="post" >Ingrese ya </button>


<fb:login-button  scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>-->
<div class="fb-login-button" scope="public_profile,email" onlogin="checkLoginState();" data-max-rows="4" data-size="large" data-show-faces="false" data-auto-logout-link="true">Registrate con Facebook</div>




<div id="status">
</div>
<br>

</div>



<script>
'use strict';

$(function() {

    //settings for slider
    var width = 540;
    var animationSpeed = 1000;
    var pause = 2000;
    var currentSlide = 1;

    //cache DOM elements
    var $slider = $('#slider');
    var $slideContainer = $('.slides', $slider);
    var $slides = $('.slide', $slider);

    var interval;

    function startSlider() {
        interval = setInterval(function() {
            $slideContainer.animate({'margin-left': '-='+width}, animationSpeed, function() {
                if (++currentSlide === $slides.length) {
                    currentSlide = 1;
                    $slideContainer.css('margin-left', 0);
                }
            });
        }, pause);
    }
    function pauseSlider() {
        clearInterval(interval);
    }

   // $slideContainer
       // .on('mouseenter', pauseSlider)
        //.on('mouseleave', startSlider);

    startSlider();


});

</script>



<!--
<h1>Red Social</h1>
<form action='login' method='post'>

    <li><input class="form" id="email" placeholder="Email" type ="text" name ="email"></li>
    <li>{{$errors->first('email')}}<br></li>
    <input class="form" id="password" placeholder="Contraseña" type ="password" name ="password">
       <li>{{$errors->first('password')}}<br></li></li>
    <li><input class="form-login" value="Iniciar Sesion" type="submit"> <br></li>
    
</form>
@if (Auth::id()==1)
<p><a href="/users/create">Create</a></p>
@endif


<br><br><br>
<div id="regis">

 <h2><a href="/form" class='btn' >Registrate, es gratis</a></h2>-->

@stop