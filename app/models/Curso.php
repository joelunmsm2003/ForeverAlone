<?php
class Curso extends Eloquent
{
    //un curso puede pertenecer a muchos usuarios, muchos a muchos con users
    public function users()
    {
        return $this->belongsToMany("User");
    }    
}