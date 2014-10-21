<?php 
class Muro extends Eloquent
{


    //un postdeunmuromuro pertenece a un usuario

        public function user() 
    { 
        return $this->belongsTo('User');     
    }


}