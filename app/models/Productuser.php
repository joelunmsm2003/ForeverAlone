<?php



class Productuser extends Eloquent  {

	protected $fillable = array('id','user_id','products_id');
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */



	protected $table = 'products_user';

	

}
