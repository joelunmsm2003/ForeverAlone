<?php

class PaqueteController extends BaseController {

   public function __construct()

   {
   	 $this->beforefilter('auth');
   }


	public function getIndex()
	{
	
		return View::make('paquete.index');
	}


}


