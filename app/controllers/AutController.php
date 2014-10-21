<?php

class AutController extends BaseController {


	public function user()
	{

		
		$data =  Input::all();
	
		$userdata = array(
				'email' => Input::get('email'),
				'password' => Input::get('password')
				);


			$reglas = array(

				'email' => 'required|email|min:5|max:100',
				'password'=> 'required',
			);

			

			$validar = Validator::make($data,$reglas);

			if($validar->fails())

			{
				return Redirect::back()->withErrors($validar);
				

			}
			else
			{

				if(Auth::attempt($userdata))
				{
		             return Redirect::to('/noticias');

				}
				else
				{
					return Redirect::back();
				}



			}


	
   }


	


}
