<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * Function define one to one relation (users to posts)
     *
     * @var array
     */
    public function post(){
        
        // $this Refers to the current object 
        // to access hasOne() method and by default
        // will look for user_id in posts table and
        // grab out the record from the table.
        return $this->hasOne('App\Post');
    }

    /**
     * Function define one to many relation (users to posts)
     *
     * @var array
     */
    public function posts() {
        
        // $this Refers to the current object 
        // to access hasMany() method and by default
        // will look for user_id in posts table
        // and grab out all the records from the table.
        return $this->hasMany('App\Post');
    }



    /**
     * Function define many to many relation (users to posts)
     *
     * @var array
     */

    public function roles() {

        // $this Refers to the current object 
        // to access belongToMany() method and by 
        // default will enable the app to grab out
        // data as one user has many roles and one
        // role has many users.
        return $this->belongsToMany('App\Role')->withPivot('role_id');

    }


    // function to enable the object of this model (User)
    // to access photo model and call imageable method.

    public function photos() {

        return    $this->morphMany('App\Photo', 'imageable');
    }


    public  function getNameAttribute($value){

        return ucfirst($value);
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
