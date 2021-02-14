<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    
    
    // Function define has many through relation
    public function posts()
    {

        /**
         * The "has-many-through" relationship provides 
         * a convenient shortcut for accessing 
         * distant relations via an intermediate relation.
         */
        return $this->hasManyThrough(
            'App\Post',  // the name of the final model we wish to access
            'App\User',  // the name of the intermediate model.
            'country_id', // Foreign key on users table...
            'user_id', // Foreign key on posts table...
            'id', // Local key on countries table...
            'id' // Local key on users table...
        );
    }


}
