<?php

namespace App;


use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $directory = "/images/";
    use SoftDeletes;

//  protected $table = 'posts';
//  protected $primaryKey = 'post_id';

    protected $fillable = ['title', 'content', 'path'];

    // so laravel treat the column deleted_at as a timestamp.
    protected $dates = ['deleted_at'];



    
    public function user()
    {
    // $this to access the method belongTo()
    // inside the class Post.
    return $this->belongsTo('App\User');

    }

    // function to enable the object of this model (Post)
    // to access photo model and call the imageable method.

    public function photos() 
    {

        return    $this->morphMany('App\Photo', 'imageable');
    }

    /**
     * Create tags function inside Post and Video 
     * model to loan tag class to many other 
     * classes (Post & Video).
     */
    public function tags()
    {
        // loan Tag class to Post class.
        return $this->morphToMany('App\Tag', 'taggable');
    } 



    //_____________Section 20 ___________


    // S20/V133 (Accessors) Manipulate data before grabbing out from our database. (No change in DB)

    public function getPathAttribute($value) {
        
        return $this->directory . $value;
    }


    // S20/V134 (Mutators) Manipulate data before insert to our database.
        public function setTitleAttribute($value) {
            // // Lara has many functions like: 
            // // ucfirst(), ucword(), strtolower(), etc 
        $this->attributes['title'] = strtolower($value);
        }


    //___________ S20/V135 Creating scope ___________

    /**
     * this function help to make the code shorter
     * and clean in the controller.
     */
    public static function scopeLatest($query) {

        return $query->orderBy('id', 'asc');

    }
}

