<?php

class ListarController extends BaseController {


	public function index()

	{
	   
		$directory ="C:\Users\NEHO8\byteindie\public\assets\img"; 

		$files = File::allFiles($directory);

		//$extension = File::extension("C:\Users\NEHO8\byteindie\public\assets\img\google.png");
		
		//print_r($extension);

		return View::make('listar')->with('files',$files);


	}



}