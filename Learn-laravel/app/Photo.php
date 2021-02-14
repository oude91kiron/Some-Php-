<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    /**
     * define a polymorph relation 
     * where Photo model loaned to 
     * both User & Post model.
     */
    
    public function imageable() {

        return    $this->morphTO();
    }
}
