@extends ('layout')
@section('title') Lista de Users @stop

@section('content')



   <div id="col_1">
      <p><a href=""><img src="{{Auth::user()->photo}}" width ="100px" height="100px"></a></p>

      </div>
  <div id="col_2">

      


@foreach($posts as $posts)


	<div id="post-one">

		<div id="post">

			<div id="post_iz"><p><img src="{{$posts->user['photo']}}" width ="40px" height="40px"></p><p>{{$posts->user['username']}}</p></div>

			<div id="post_de"><p>{{$posts->title}}</p><p>{{$posts->content}}</p></div>

			{{ Form::open(array('url' => 'like', 'class' => 'like')) }}
			<input type="text" name="post" id="post" value="{{$posts->id}}" width ="140px" height="40px">
			{{ Form::submit('Me gusta', array('class' => 'ilikeu', 'name' => 'like')) }}
			{{ Form::close() }}  

		</div> 


			@foreach ($posts->comments as $coment)

			<div id="post_iz"><p><img src="{{$coment->user->photo}}" width ="40px" height="40px"></p><p>{{$coment->user->username}}</p></div>

			<div id="post_de">{{$coment->comment}}</div><br>

			@endforeach

			<button onclick="myFunction()">Try it</button>

			{{ Form::open(array('url' => 'comentar', 'class' => 'ajax')) }}

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




 </div>

 <div id="col_3">
Chat
 </div>


  <script type="text/javascript">

$('input#post').hide();

$('form.like').on('submit',function(){

    var that = $(this),
    url = that.attr('action'),
    type = that.attr('method'),
    data ={};

    that.find('[name]').each(function(index,value){

            var that = $(this),
            name = that.attr('name'),
            value =that.val();

            data[name]=value;

            });

   

   $.ajax({
            url:url,
            type:type,
            data:data,



            success:function(response){
            
            console.log(response);

              $('.ilikeu').val(response);

          
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

            });

            $.ajax({
            url:url,
            type:type,
            data:data,

            success:function(response){
            $('.comentario').text(response);
            }
            });
    return false;

    });

        

</script>





@stop

