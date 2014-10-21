<?php



class Useramigo extends Eloquent  {

	protected $fillable = array('id','user_id','amigo_id');
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */



	protected $table = 'amigo_user';

	

}
