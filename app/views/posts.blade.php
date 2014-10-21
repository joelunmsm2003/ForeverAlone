@extends ('layout')
@section('title') Biografia @stop

@section('content')



      <div id="col_1">
      <p><a href="/users/{{$id_user->id}}"><img src="{{$id_user->photo}}" width ="100px" height="100px"></a></p>
      <h4>
@if (Auth::check())
{{$id_user->username}}

@endif


</h4>

      @if (Auth::id()==$id_user->id)
      <p><a href="/users/{{$id_user->id}}/edit" >Editar Datos</a></p>

      @endif
      </div>

       

      <div id="col_2">

          <h4>Actualizar estado</h4>
            <div id= "post_1">
         
            <!--{{ Form::open(array('url' => 'publi_post', 'class' => 'publi_post')) }}-->

            {{ Form::open(array('action' => 'PostsController@store')) }}

            <li><input class="form" id="id" placeholder="{{$id_user->id}}" type ="hidden" name ="id" value="{{$id_user->id}}"></li>

            @if (Auth::id()==$id_user->id)

            <li><input class="form"  placeholder="Que estas pensando?" type ="content" name ="content" autocomplete="off"></li>

            @else

            <li><input class="form"  placeholder="Escribe algo..." type ="content" name ="content" autocomplete="off"></li>

            @endif

            {{Form::button('Publicar',array('type'=>'submit','class'=>'form-login')) }}

            {{ Form::close() }}



	          </div>



      <div id="post_publi"></div>


@foreach ($posts as $posts)
 
<div id="post-one" class= "{{$posts->id}}">

        <div id="post">

 		    <div id="post_iz">
        
        <p><img src="{{$posts->user->photo}}" width ="40px" height="40px"></p><p>{{$posts->user->username}}</p>
   

        </div>
        <div id="post_de">
        
        


        <p>{{ Form::open(array('url' => 'el_post', 'class' => 'eliminar')) }}
        <input type="hide" id ="eliminar" name="eliminar" value="{{$posts->id}}" class ="{{$posts->id}}" width ="140px" height="40px">
        {{ Form::submit('Eliminar', array('class' => 'eliminar')) }}
        {{ Form::close() }}</p>

       
        <p>{{$posts->content}}</p>

      
    

        <input type="hide"  id = "xyz" value="{{$y=0}}"  >

       
        @for ($i = 0; $i < count($posts->likes); $i++)
        
        @if($posts->likes[$i]['user_id']==Auth::user()->id)

        

        <input type="hide"  id = "xyz" value="{{$estado_like = $posts->likes[$i]['like']}}"  >

        @endif


        @if($posts->likes[$i]['like']=='Ya no me gusta')

        <input type="hide"  id = "xyz" value="{{$y=$y+1}}"  >


        @endif

        @endfor

        
                
        <br>

      {{ Form::open(array('url' => 'megusta', 'class' => 'megusta')) }}

      <input type="hide" id ="megusta" name="megusta" value="{{$posts->id}}" class ="{{$posts->id}}" width ="140px" height="40px">
     
      @if(count($posts->likes)==0)


      <input type="submit"  id = "xxxx" value="Me gusta" class ='{{$posts->id}}{{$posts->id}}' name ='ola'>
      A <input type="text" id="pgusta" value="0" class = '{{$posts->id}}{{$posts->id}}{{$posts->id}}' name='pgusta'>personas le gusta esto 

      <br>
      @else

      

      <input type="submit" id = "xxxx" value="{{$estado_like}}" class ='{{$posts->id}}{{$posts->id}}' name ='ola'  >
    

      A <input type="submit" id="pgusta" value="{{$y}}" class = '{{$posts->id}}{{$posts->id}}{{$posts->id}}' name='pgusta'> personas le gusta esto 
     <br>
      @endif

      

      </form>


        </div>
   
        </div> 

       

        @foreach ($posts->comments as $coment)
        

        <div id="post_iz"><p><img src="{{$coment->user->photo}}" width ="40px" height="40px">    {{$coment->user->username}}</p></div>
        
        <div id="post_de">{{$coment->comment}}</div><br>



        @endforeach


          {{ Form::open(array('url' => 'comentar', 'class' => 'ajax')) }}
          
           <input id="x_x" name="comentario" value="{{$posts->id}}" type="hide">
           <input id="x_x" name="nombre" value="{{Auth::user()->username}}" type="hide">
           <input id="x_x" name="photo" value="{{Auth::user()->photo}}" type="hide">

           <div id="{{$posts->id}}"></div>  
          <div id="post_iz"><p><img src="{{Auth::user()->photo}}" width ="40px" height="40px"></p></div>
          <div id="post_de"><input type="text" name="comentar" id="comentar" placeholder =" Escribe un comentario"></div>
          <input type="text" name="post" id="post" value="{{$posts->id}}" width ="140px" height="40px">
          
          {{ Form::submit('', array('class' => 'button expand round')) }}
 
          {{ Form::close() }}


          </div>

     @endforeach


       </div>


<div id="col_3">

Personas que quizas conozcas
<br>
@foreach ($usuarios as $usuarios)

          <li><a href="/post/{{$usuarios->id}}" class="selected"><img src="{{$usuarios->photo}}" width ="100px" height="100px"></a></li>
        <li><a href="/post/{{$usuarios->id}}" class="selected">{{$usuarios->username}}
        <a href="/add_user_amigo/{{$usuarios->id}}" class="selected"><br>Agregar como amig@</a></li>
      

@endforeach


 </div>

<div id="col_4">
<frame name="alto" src="http://localhost:8080/">
 </div>



<script type="text/javascript">

  $.ajax({
            url:'../noti',
            type:'get',
            data:'ddd',

            success:function(response){

              
            var key, count = 0;

            for(key in response) {
            if(response.hasOwnProperty(key)) {
            count++;
            }
            }

            console.log(count);
            console.log(response[0]['id']);

            for (i = 0; i < count; i++) {

            elemento1 = document.createElement('li');
            elementoa = document.createElement('a');
            elementoa.class = 'selected';
            elementoa.href="/logout";

            elementoa.appendChild(document.createTextNode(response[i]['content']));
            elemento1.appendChild(elementoa);
            elemento2 = document.getElementById('glob');
            elemento2.appendChild(elemento1);
       

       

            }

            }
            });








$('form.publi_post').on('submit',function(){

    var that = $(this),
    url = that.attr('action'),
    type = that.attr('method'),
    data ={};

    
    that.find('[name]').each(function(index,value){

            var that = $(this),
            name = that.attr('name'),
            value =that.val();
            
            data[name]=value;


             if(name=="content"){
              c_c =that.val();

              console.log(c_c);
             }

              if(name=="comentario"){
              c_c =that.val();
              console.log(c_c);
              
             }
               if(name=="nombre"){
              nombre =that.val();

              
             }
                if(name=="photo"){
              photo =that.val();

              
             }

 
            });

            $.ajax({
            url:url,
            type:type,
            data:data,

            success:function(response){

            AddAChildpost(response,"post_publi",nombre,photo);
         
            $('input.form').val("");


            }
            });
            
    return false;

    });



</script>
    
<script type="text/javascript">
  
$('input#eliminar').hide();
$('input#megusta').hide();



$('form.eliminar').on('submit',function(){

    var that = $(this),
    url = that.attr('action'),
    type = that.attr('method'),
    data ={};

   

       that.find('[name]').each(function(index,value){

            var that = $(this),
            name = that.attr('name'),
            value =that.val();

            data[name]=value;

              if(name=="eliminar"){
              c_c =that.val();
            

            
             }

            });

   $.ajax({
            url:url,
            type:type,
            data:data,



            success:function(response){
            
            
              $('.'+c_c).hide();
              

          
            }
            });
    return false;



});

</script>

<script type="text/javascript">



</script>

<script type="text/javascript">


$('input#post').hide();
$('input#x_x').hide();
$('input#xyz').hide();
var i=0;

$('.megusta').on('submit',function(){

    var that = $(this),
    url = that.attr('action'),
    type = that.attr('method'),
    data ={};

   

    that.find('[name]').each(function(index,value){


            var that = $(this),
            name = that.attr('name'),
            value = that.val();

            data[name]=value;

             if(name=="megusta"){

              c_c =that.val();
              


              
             }

              if(name=="ola"){

              c_x =that.val();
              console.log("LIKES LOG");

               console.log(c_x);
              
             }

               if(name=="pgusta"){


              np =that.val();
              np = parseInt(np)

              console.log("np");
              console.log(np);
              i=i+1;
      

              
              
             }

           
      
  
            });


              console.log("np");
              console.log(np);

    $.ajax({
            url:url,
            type:type,
            data:data,

            success:function(response){

            $('.'+c_c+c_c).val(response);
            $('.'+c_c+c_c+c_c).val(np);
            console.log(response);


            }
            });



            return false;
 

});

$('form.ajax').on('submit',function(){

    var that = $(this),
    url = that.attr('action'),
    type = that.attr('method'),
    data ={};

    
    that.find('[name]').each(function(index,value){

            var that = $(this),
            name = that.attr('name'),
            value =that.val();
            

            data[name]=value;
             
    
             if(name=="comentario"){
              c_c =that.val();
              console.log(c_c);
              
             }
               if(name=="nombre"){
              nombre =that.val();

              
             }
                if(name=="photo"){
              photo =that.val();

              
             }


        


            });

            $.ajax({
            url:url,
            type:type,
            data:data,

            success:function(response){


            AddAChild (response,c_c,nombre,photo);
            $('input#comentar').val("");
            //console.log(response);
            //document.body.appendChild(document.createElement("<strong>Hello</strong>"));
  


            }
            });
            
    return false;

    });


</script>

  <!--<button onclick='AddAChild ();'>Add a div element to the container!</button>-->
  


  <script type="text/javascript">

        function AddAChild (x,y,nombre,photo) {
            var newElem = document.createElement ("div");
            newElem.innerHTML = "<div id='post_iz'><p><img src="+photo+" width ='40px' height='40px'>"+nombre+"</p></div><div id='post_de'>"+x+"</div>";
            newElem.style.color = "red";

            var contaner = document.getElementById (y);
            contaner.appendChild (newElem);
        }


              function AddAChildpost (x,y,nombre,photo) {
            var newElem = document.createElement ("div");
            newElem.innerHTML = "<div id='post-one' class= '1'><div id='post_iz'><p><img src="+photo+" width ='40px' height='40px'>"+nombre+"</p></div><div id='post_de'>"+x+"</div></div><p>hhhhh</p>"

            newElem.style.color = "red";

            var contaner = document.getElementById (y);
            contaner.appendChild (newElem);
        }

       
    </script>



@stop
