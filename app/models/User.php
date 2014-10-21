<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	protected $fillable = array('email','username','password','photo');
	
	
	protected $perPage = 2;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName()
	{
		return 'remember_token';
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	/*blog*/

	public function products()
    {
        return $this->belongsToMany("Products");
    }  

	 public function posts() 
    { 
        return $this->hasMany('Post'); 
    }

    //Un usuario tiene muchos postdemuros

    	 public function muros() 
    { 
        return $this->hasMany('Muro'); 
    }
 
 
    //relación muchos a muchos entre usuarios y cursos
    public function cursos()
    {
        return $this->belongsToMany("Curso");
    }


     public function amigos()
    {
        return $this->belongsToMany("Amigo");
    }


 
    //relación uno a muchos entre usuarios y comments
    public function comments() 
    { 
        return $this->hasMany('Comment'); 
    }
 
    //relación uno a uno entre users y dnis
    public function dni()
    {
        return $this->hasOne("Dni");
    }
 
    //vamos añadiendo lo que necesitamos eliminar
    public function delete()
    {
        //eliminamos los posts 
        if(count($this->posts) > 0){
            foreach($this->posts as $post)
            {
                $post->delete();
            }
        }
 
        //eliminamos el dni
        if($this->dni){
            $this->dni->delete();
        }
 
        //eliminamos los comentarios
        if(count($this->comments) > 0){
            foreach($this->comments as $comment)
            {
                $comment->delete();
            }
        }
 
        //eliminamos la información de la tabla curso_user con detach
        //que hace referencia al usuario
        if(count($this->cursos) > 0){
            $this->cursos()->detach();
        }
 
        //eliminamos al usuario
        return parent::delete();
    } 

    /*Login Facebook*/

     public function profiles()
    {
        return $this->hasMany('Profile');
    }

     public static function insert_users($username,$email,$password,$photo,$link,$gender)
    {
 
        $query = DB::table('users')->insert(array(
                 'username' => $username,
                 'email'  => $email,
                 'password' => Hash::make($password),
                 'photo' => $photo,
                 'link' => $link,
                 'gender' => $gender
        ));
 
        return $query;
 
    }   


}
