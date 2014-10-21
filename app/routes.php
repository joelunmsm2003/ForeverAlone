<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::resource('users','UsersController');

Route::resource('products','ProductsController');

Route::resource('listar','ListarController');

Route::resource('posts','PostsController');

Route::resource('noticias', 'NoticiasController');


Route::get('form', function(){
 //render app/views/form.blade.php
 return View::make('form');
})->before('login');

Route::get('/login', function(){
 
 return View::make('login');
})->before('login');

Route::get('/', function(){
 //render app/views/form.blade.php
 //return View::make('login');
 return Redirect::guest('/noticias');





})->before('auth.basic');



Route::get('noti', function(){

$post = Post::where('muro_id', '=', Auth::user()->id)->get();
 
 return Response::json($post);
});


Route::post('form-submit', array('before'=>'csrf',function(){
 //form validation come here
}));



Route::get('login2', ['before' => 'auth.basic', function(){
    return View::make('hello');
}]);

Route::get('map', function()
{
	return View::make('map');
	
});




//Route::post('login','AutController@user');

Route::get('logout', function()
{
	Auth::logout();
	return Redirect::to('/');
	
});


Route::get('files', function()
{
        $directory ="/home/byte/Escritorio/shop-laravel-master/public/assets/img"; 

        $files = File::allFiles($directory);

        return View::make('fileform')->with('files',$files);
});



Route::controller('paquete','PaqueteController');

/*Upload file*/




Route::post('/fileform', function()
{
	
	$destinationPath='public/assets/img/';

	$name = Input::file('myfile')->getClientOriginalName();

	Input::file('myfile')->move($destinationPath,$name);

    return Redirect::to('/products/create');
   
	
});

Route::post('/fileform_1', function()
{
    
    $destinationPath='public/assets/img/';

    $name = Input::file('myfile')->getClientOriginalName();

    Input::file('myfile')->move($destinationPath,$name);

    return Redirect::to('/files');
   
    
});




/*Blog*/

Route::get("new", function(){

    $user = new User;//creamos un modelo user
    $dni = new Dni;//creamos un modelo dni
    $post = new Post;//creamos un modelo post
    $comment = new Comment;//creamos un modelo comment

    $user->username = "Juanjo";
    $user->email = "juanj7o@mail.com";
    $user->password = Hash::make('676');;
    $user->save();//guardamos un modelo user
    $post->user_id = 3;
    $post->title = "Post de juan";
    $post->content = "Contenido de juan";
    $post->save();//guardamos un modelo post
    $comment->user_id = 1;
    $comment->post_id = 3;
    $comment->subject = "Hola soy juan";
    $comment->comment = "hola soy juan";
    $comment->save();//guardamos un modelo comment
    $dni->user_id = 2;
    $dni->numero = "99999999-W";
    $dni->save();//guardamos un modelo dni

});

Route::post("/megusta", function(){

        if(Request::ajax()){

           $like = new Like;
           $like->user_id = Auth::id();
           $like->post_id = $_POST['megusta'];
           $like->like =$_POST['ola'];


           $o_o = Like::where('user_id', '=', Auth::user()->id)

           ->where('post_id','=', $_POST['megusta'])
           ->take(100)->get();
           

            if(count($o_o)>0){


            $id=$o_o['0']['id'];
            $megusta=$o_o['0']['like'];

            if($megusta=="Me gusta"){

            $lik = Like::find($id);
            $lik->like="Ya no me gusta";
            $lik->save();
            $megusta ="Ya no me gusta";

            }

            else{


            $lik = Like::find($id);
            $lik->like="Me gusta";
            $lik->save();
            $megusta ="Me gusta";

            }
            }
            else{
                 $like->save();
                 $megusta ="Ya no me gusta";

            }

            

                 return Response::json($megusta);
           

           //$like->save();
            

     //guardamos un modelo comment
            
           

        }

 
});

Route::post("/el_post", function(){

        if(Request::ajax()){

            $post = Post::find($_POST['eliminar']);
         $post->delete();
      

            return Response::json($_POST);

        }

 
});


Route::post("/publi_post", function(){

        if(Request::ajax()){

            $content=$_POST['content'];

            $http = substr($content,0,4);

            if($http=='http'){

                $a = substr($content,6,17);
                $content = substr($content,32,12);
                $xxx = '//www.youtube.com/v/'.$content;
                $yyy = '<object width="420" height="315"><param name="movie" value="'.$xxx;
                $zzz = $yyy.'?hl=en_US&amp;version=3&amp;rel=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="';
                $aaa = $zzz.$xxx;
                $bbb = $aaa.'?hl=en_US&amp;version=3&amp;rel=0" type="application/x-shockwave-flash" width="420" height="315" allowscriptaccess="always" allowfullscreen="true"></embed></object>';
                $content = $bbb;
            }


            $post_muro = new Post;
            $post_muro->user_id = Auth::id();
            $post_muro->muro_id = $_POST['id'];
        
            $post_muro->content = $content;
            $post_muro->save();//guardamos un modelo comment
            $posts_user = Post::where('muro_id', '=', $_POST['id'])->orderBy('created_at','desc')->get();

            return Response::json($content);

        }

 
});



Route::get("nuevo_curso", function(){
 
    $curso = new Curso;
    $curso->curso = "Programación con php";//si estamos aquí es que somos muy buenos
    $curso->save();
 
});



Route::get("nuevo_producto", function(){
 
    $products = new Products;
    $products->caracteristica = "Holap";//si estamos aquí es que somos muy buenos
    $products->save();
 
});

Route::get("add_user_curso", function(){

	$curso = Curso::find(1);
	$user = User::find(2);
	$user->cursos()->save($curso);
});


/*
Route::get("/noticias", function(){

$posts = Post::all();

$arr = array('a' => 'mamamama', 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);


$x =json_encode($arr);
//var_dump($x);

return View::make('noticias')->with('x', $x);

});

*/



Route::get("add_post", function(){

$user = User::find(Auth::id());
return View::make('add_post')->with('id_user', $user);

});




Route::get("add_user_producto/{id}", function($id){

    $x=0;

	$products_user = Productuser::where('user_id', '=', Auth::user()->id)->take(100)->get();
    $products = Products::find($id);


	foreach ($products_user as $products_user)
	{
	
		if ($products->id == $products_user->products_id){

	    return Redirect::guest('/products');
	    $x=1;

		}

	}


		if ($x==0){
	
		$id_user = Auth::user()->id;
		$products = Products::find($id);
		$user = User::find($id_user);
		$user->products()->save($products);
		return Redirect::guest('/products');

		}


});

Route::get("add_user_amigo/{id}", function($id){

    $x=0;

    $amigo_user = Useramigo::where('user_id', '=', Auth::user()->id)->take(100)->get();
    $user = User::find($id);


    foreach ($amigo_user as $amigo_user)
    {
    
        if ($user->id == $amigo_user->amigo_id){

        $x=1;
        return Redirect::back();

        }

    }


        if ($x==0){
    
        $amigo = Amigo::find($id);
        $user = User::find(Auth::user()->id);
        $user->amigos()->save($amigo);
        return Redirect::back();

        }


});


Route::get("curso", function(){
 
    $user = User::find(1);
    if(count($user->cursos) == 0){
        echo "El usuario no ha contratado ningún curso";
    }else{
        foreach($user->cursos as $curso){
            echo $curso->curso;
        }
    }
});

Route::get("post/{id}", function($id){
 
    $user = User::find($id);
    $usuarios = User::all();
    $posts_user = Post::where('muro_id', '=', $id)->orderBy('created_at','desc')->get();

  $post = Post::where('muro_id', '=' ,Auth::user()->id)->take(100)->get();




     return View::make('posts')->with('id_user', $user)
     ->with('usuarios',$usuarios)
     ->with('posts',$posts_user)
     ->with('post', $post);
    
});


Route::post("/comentar", function(){


   
        if(Request::ajax()){

            $comment = new Comment;
            $user_id = Auth::id();

           
            $comment->user_id = $user_id;
            $comment->post_id = $_POST['post'];
            $comment->comment = $_POST['comentar'];
            $comment->save();
       
            
            return Response::json($comment->comment);

        }
  
});



Route::get("/like_get", function(){


   
        if(Request::ajax()){

          
            
            return Response::json("gggg");

        }
  
});



Route::get("producto", function(){
 
    $user = User::find(1);
    echo count($user->products);
    if(count($user->products) == 0){
        echo "El usuario no ha contratado ningún curso";
    }else{
        foreach($user->products as $products){
            echo $products->tipo;
        }
    }
});

Route::get("content_coments", function(){
 
    if(Request::ajax()){

         $coment= Comment::all();

         return Response::json($coment);

    }

});




//podemos obtener a un usuario por su id
Route::get('productsuser/{id}', function($id)
{
 

  $user = User::find($id);
  return View::make('deseos')->with('id_user', $user);
 
});

Route::get('amigos/{id}', function($id)
{
 
  $user = User::find($id);
  return View::make('amigos')->with('user', $user);
 
});



 



Route::post("/registra", function(){

    if(Request::ajax()){

         $username = e(Input::get('username'));
         $email = e(Input::get('email'));
         $gender = e(Input::get('gender'));
         $link = e(Input::get('link'));
         $photo = e(Input::get('photo'));
         
         $password = "123";
         
         
         //$insert = User::insert_users($username,$email,$password);

          $user_new = User::where('username', '=' ,Input::get('username'))->take(100)->get();

            foreach ($user_new as $user_new)
            {   

               if ($user_new->email==$email) {  
               Auth::loginUsingId($user_new->id);
               $log ="Logeado";
               }  
               
            }

            if(!isset($log)){


                    $insert = User::insert_users($username,$email,$password,$photo,$link,$gender);

                    $user_new = User::where('email', '=' ,Input::get('email'))->take(100)->get();

                    foreach ($user_new as $user_new)
                    {   

                    if ($user_new->email==$email) {  
                    Auth::loginUsingId($user_new->id);
                    $log ="Logeado";
                    }  

                    }
            }

        return Response::json($log);
        
    }

    
});


