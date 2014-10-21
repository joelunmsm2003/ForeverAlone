<?php

class UsersController extends \BaseController {




	public function index()
	{
		if (Auth::user()){


		$users = User::all();

		return View::make('list')->with('users',$users);

	}
	else
	{
		//return Redirect::guest('/login');
		$users = User::all();
		return View::make('list')->with('users',$users);
	}
	}
	public function create()

{
	return View::make('form');


}

	public function store()

{			
			$data_form = Input::all();
			
			$username = e(Input::get('username'));
			$password = e(Input::get('password'));
			$email = e(Input::get('email'));

			$reglas = array(

				'username' => 'required',
				'email' => 'required|email|min:5|max:100|unique:users,email',
				'password'=> 'required',
			);
			
			$messages = array(
            'required' => 'El campo :attribute es obligatorio.',
            'min' => 'El campo :attribute no puede tener menos de :min carácteres.',
            'email' => 'El campo :attribute debe ser un email válido.',
            'max' => 'El campo :attribute no puede tener más de :min carácteres.',
            'unique' => 'El email ingresado ya existe en la base de datos'
           );

			

			$validar = Validator::make(Input::all(),$reglas,$messages);

			if($validar->fails())

			{
				return Redirect::back()->withErrors($validar);

			}
			else
			{


			 $insert = User::insert_users($username,$email,$password);

			 $user_new = User::where('email', '=' ,Input::get('email'))->take(100)->get();

			foreach ($user_new as $user_new)
			{		   
			   
			    Auth::loginUsingId($user_new->id);
			}

			
			return Redirect::action('ProductsController@index');


			}



}

	public function login()

{
	$credenciales= array(

		'username' => Input::get('email'),
		'password' => Input::get('password'),

		);

	if(Auth::attempt($credenciales))
	{
		return "El usuario ha sido identificado correctament";
	}
	else

	{
		return Redirect::action('UsersController@index');
	}


}


	public function show($id)


	{   
		if (Auth::user()) {

		$user = User::find($id);
	
		return View::make('show_user',array('user'=>$user));

	
	    }

	    else{

	    	return Redirect::guest('/login');
	    }
	
	}

	public function edit($id)

	{

		

		$user = User::find($id);


		return View::make('edit_user')->with('user',$user);
		

		
	}

	public function update($id)
	{   

	$user = User::find($id);
	$data = Input::all();
	$user-> fill($data);

	$user->password = Hash::make(Input::get('password'));


	$user-> save();

	

	return View::make('edit_user')->with('user',$user);
	}


}


