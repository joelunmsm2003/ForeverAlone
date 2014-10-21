<?php 
class Post extends Eloquent
{

    protected $fillable = array('id','user_id','muro_id','title','content');
    /**
     * The database table used by the model.
     *
     * @var string
     */

    protected $table = 'posts';

    //un post pertenece a un usuario
    public function user() 
    { 
        return $this->belongsTo('User'); 
    }


 
    //un posts tiene mucho comentarios
    public function comments() 
    { 
        return $this->hasMany('Comment'); 
    }

    public function likes() 
    { 
        return $this->hasMany('Like'); 
    }

     public function muro() 
    { 
        return $this->belongsTo('Muro'); 
    }
 
    //eliminamos el post y todos sus comentarios
    public function delete()
    {
        //eliminamos los comentarios del post 
        foreach($this->comments as $comment)
        {
            $comment->delete();
        }
        //eliminamos el post
        return parent::delete();
    }
}