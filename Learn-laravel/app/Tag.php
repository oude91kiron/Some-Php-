<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{    
    
    /**
     * posts function enable the Tag object to 
     * be loaned for Post model.
     */
    public function posts()
    {
        // Any Tag object loaned by many (by Post).
        return    $this->morphByMany('App\Post', 'taggable');
    }


    
    /**
     * videos function enable the Tag class to 
     * be loaned for videos model.
     */
    public function videos()
    {
        // Any Tag object loaned by many (by Video)..
        return    $this->morphByMany('App\Video', 'taggable');
    }
    
}
