<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{

    /**
     * tags method 
     */
    public function tags()
    {   
        // loan Tag class to Video class.
        return $this->morphToMany('App\Tag', 'taggable');
    } 

}
