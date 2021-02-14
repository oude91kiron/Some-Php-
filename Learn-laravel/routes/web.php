<?php

use App\Http\Controllers\PostController;
use carbon\carbon;
use App\Country;
use App\Post;
use App\get;
use App\User;
use App\Photo;
use App\Video;

use Illuminate\Support\Facades\Route;

/*
|------------------------------------------------
| Web Routes                                    -
|------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('welcome');

});



// Route::get('/post/{id}/{name}', function ($id, $name) {

//     return "This is post has the id: ". $id . " for " . $name;

// });


// ***** Route neckname by defining an array 4/19 *****
// Route::get('/admin/post/example', array('as'=>'firstURL' , function () {

//     $url = route('firstURL');

//     return " This is first URL: " . " " . $url;
// }));


// // Laravel 7.0
// Route::get('/', 'PostsController@index')

// // Laravel 8.0
// Route::get('/checking', '\App\Http\Controllers\PostsController@index'); 


// ***** Passing data 5/24 *****
// Route::get('/post/{id}', 'PostsController@index');




// ***** Resources & controller 5/25 *****
Route::resource('posts', 'PostsController');

Route::get('/contact', 'PostsController@contact');

// // Route User to PostsController and access the method show_post.
// Route::get('post/{id}/{name}/{email}', 'PostsController@show_post');

//**************************************************************************************************************

/*
|---------------------------------------------
| Database Raw SQL Queries                   -
|---------------------------------------------
*/

//Insert data by the static method insert from the DB class-----------------------------------------------------

//  Route::get('/insert', function(){

//     DB::insert('INSERT INTO posts(title, content) VALUE (:title , :content)',
//     [':title'=>'Let\'s learn php guys ', ':content' => 'Laravel is a PHP framwork that keep php alive']);
// });


// Read data form posts table----------------------------------------------------------------------------------

// Route::get('/read', function() {
//     // Read info from the database.
//     $rows = DB::select('SELECT * FROM posts WHERE id = :id', [':id' => '2']);


//     foreach ( $rows as $row ) {

//         return $row->content;
//     }
// });


// Update data in posts table----------------------------------------------------------------------------------

// Route::get('/update', function() {

//     $updated = DB::update('UPDATE posts SET title = "update title"
//     WHERE id = :id' , [':id'=>'2']);

//     return $updated;
// });


// Delete data form posts table--------------------------------------------------------------------------------

// Route::get('/delete', function () {

//     $deleted = DB::delete('DELETE FROM posts
//      WHERE id=:id', [':id'=>'1']);

//     return 'record number ' .  $deleted . ' has been deleted';
// });

//**************************************************************************************************************

/*
|---------------------------------------------
| ELOQUENT OR OBJECT RELATIONAL MODEL (ORM)  -
|---------------------------------------------
*/


// Reading data----------------------------------------------------------------------------------
//  Route::get('/find', function () {

//      // all() method will create a collaction of data.
//      $posts = Post::all();

//      //dd($posts);

//      foreach($posts as $post){

//          echo $post->title . "<br>";
//      }

//  });



// read specific data----------------------------------------------------------------------------
//  Route::get('/find', function () {

//      $posts = Post::find(2);

//          return $posts->content;

//  });



//  Route::get('/content', function () {

//     $row = get::find(2);
//     return $row->title;
//  });



// chaining methods -----------------------------------------------------

// Route::get('/findwhere', function () {

//     $posts = Post::where('id', 8)->orderBy('id', 'desc')->take(1)->get();

//     return $posts;
// });



// Insert data eloquently -----------------------------------------------

// Route::get('/basicinsert', function () {

//     $post = new Post;

//     $post->user_id = '2';
//     $post->title = 'Lara beatiful';
//     $post->content = 'therd record for user id 2';

//     $post->save();
// });




// Update data eloquently -----------------------------------------------

//  Route::get('/basicinsert2', function () {

//      // find the record we want to update.
//      $post = Post::find(2);

//      // update the elements for that record.
//      $post->title = 'Wael khyat doesn\'t love Laravel';
//      $post->content = 'Wow ahmad kourunfol love lar';

//      // save the changes.
//      $post->save();
//  });



// Create data using create() method -----------------------------------

//  Route::get('/create', function () { 
//     // To use the create method u have to define the mass asignment 
//     // in the model Post.
//     Post::create([
//          'title'=>'we are coming 21.08.2013',
//          'content'=>' new date 2010'
//     ]);

//  });



// Update data using update() method -----------------------------------

//   Route::get('/update', function () {

//      Post::where('id', 9)->update(['title'=>'Lara will change my life',
//       'content'=>'Lara is a PHP framwork']);

//   });



// Delete data in eloquent way --------------------------------------------

// _________first way: delete() method___________
// Route::get('/delete', function () {

//     $record = Post::find(2);

//     $record->delete();
// });


// ___________second way: destroy() method___________

//  Route::get('/delete2', function () {
//      Post::destroy([7, 9]);

//  });

//__________Third way: where() statment______________
// Route::get('/delete3', function () {

//     Post::where('id','>', 2)->delete();

// });


// Softe delete ----------------------------------------------------------

//____________Trashing records (fake deleting data)______________
/* Before we can delete a data we have to import SoftDeletes class to 
   our model Post and create a new column in the posts table and tell
   laravel that this column is timestamp then we can trashing data.*/


// Route::get('/softdelete', function () {

//     Post::find(2)->delete();
// });


//_____________Read trashed data________________

// Route::get('/readsoftdelete', function () {

    // __We can't read trashed records using find() method.__
    // $post = Post::findOrFail(9);
    // return $post->title;

    // __read all records using the static method withTrashed().__
    // $post = Post::withTrashed()->where('id', 9)->get();
    // return $post;


    // __read only the trashed records using the static method onlyTrashed();
    // $post = Post::onlyTrashed()->get();
    // return $post;
// });


//_____________Restor trashed data________________

// We restor trashed data by using the method restore().

// Route::get('/restortrashed', function() {

//     Post::withTrashed()->restore();
// });


//________Deleting a record permanently_________

// We delete data forever using the method forceDelete().

// Route::get('/forceDelete', function() {

// // We use the static method onlyTrashed() because
// // we don't want to delete all data.

// Post::onlyTrashed()->forceDelete();

// });


//**************************************************************************************************************

/*
|---------------------------------------------
| ELOQUENT Releations                        -
|---------------------------------------------
*/



//_______________ One to one relationship ________________
// Route::get('/user/{user_id}/post', function($user_id) {
//     // note: you have to import User class.
//     $data =  User::find($user_id)->post->content;

//     return $data;
// });



//_______________ The inverse relation ________________
// Route::get('/post/{post_id}/user', function($post_id) {

//     // We have to create function user() inside 
//     // Post class.
//     $data =  Post::find($post_id)->user->email;

//     return $data;
// });



//_______________ One to many relationship ________________

// Route::get('/user/{user_id}/posts', function($user_id) {

//     // Create user object.
//     $user = User::find($user_id);

//     // Loop through all the posts of the
//     // object $user and printed.
//     foreach ( $user->posts as $post) {
//         // Lara considers the methods as properties.
//         echo $post->title . "<br>";
//     }

// });



//_______________ Many to many relationship ________________

// Route::get('/user/{user_id}/roles', function($user_id) {

//     // Create user object.
//     $user = User::find($user_id);

//     // Loop through all the roles of the
//     // object $user and printed.
//     foreach ( $user->roles as $role) {
//         // Lara considers the methods as properties.
//         echo $role->name . "<br>";
//     }

// });



//_______________ Accessing the pivot table ________________

// Route::get('/user/pivot', function() {

//     // Create user object.
//     $user = User::find(2);

//     // pull out role rows for that user
//     $rows = $user->roles;

//     // loop through role rows
//     foreach ( $rows as $row) {
//         // access pivot table and pull out 
//         // all the role_id for that user(id=2) 
//         echo $row->pivot->role_id . "<br>";
//     }

// });



//_____________ Has many through relation __________________

// Route::get('/user/country', function () {

//     // TO DO ?

//     $country = Country::find(4);

//     foreach($country->posts as $post_record) {

//         echo $post_record->title . '<br>';
//     }




// });


//**************************************************************************************************************

/*
|---------------------------------------------
| Polymorphic relations                      -
|---------------------------------------------
*/

//____________ Morphic relation useing Photo model ___________

// Route::get('/user/photos', function() {

//     $user = User::find(1);

//     // The photos method enable the user object 
//     // to access Photo model and pull data out.
//     $rows = $user->photos;

//     foreach($rows as $row) {

//         return $row->path;
//     }

// });


//____________ Inverse Morphic relation _____________

// Route::get('photo/{id}/UserOrPost', function($id) {

//         // Get the photo record for the id.
//         $photo = Photo::findOrFail($id);

//         // id = 1 return user record where photo object pointing to 'App\User' 
//         // id = 2 return post record where photo object point to 'App\Post'
//         return $photo->imageable;
        
// });



// ____________  Morphic relation many to many _____________

// Route::get('/post/{id}/postOrvideo', function($id){

//     // create Post & Video objects.
//     $post = Post::findOrFail($id);
//     $video = Video::find($id);

//     // pull out all the Tag records for the Post object has $id.
//     foreach ($post->tags as $tag)
//     {
//         // Print the name from these records.
//         echo $tag->name . "<br>";
//     }

//     // pull out all the Tag records for the Video object has $id.
//     foreach ($video->tags as $tag)
//     {
//         // Print the name from these records.
//         echo $tag->name . "<br>";
//     }

// });


/*
|------------------------------------------------
| CRUD App                                      -
|------------------------------------------------
|
*/


// we create a group of routes so we can display 
// flash messages from $errors variable.
Route::group(['middleware'=>'web'], function() {

// Create a route for posts table.
Route::resource('/posts', 'PostsController');

//------------------------------------------------------------------------------



/*
|------------------------------------------------------
| Section 20: Database - Some more model manipulation -
|------------------------------------------------------
|
*/
// s20/132v  DateTime class Vs Carbon pakage 
Route::get('/date', function() {

    echo "Using object of the DateTime class:\n";
    echo '<br>';
    $date = new DateTime('+1 day');

    echo $date->format('d-m-Y');

    echo '<br>';

    echo "Using Carbon class and it's static now() method:";
    echo '<br>';

    echo Carbon::now()->addDays(-15)->diffForHumans();

    echo '<br>';


    echo Carbon::now()->subMonths(17310)->diffForHumans();
    echo " Prophet Mouhamad {{صل الله عليه وسلم}} has sent by God";


    echo '<br>';
    echo Carbon::now()->yesterday();

});


//----------------------------------------------------------------------
Route::get('/getTitle', function() {
   
    $obj = Post::findOrFail(5);

    return $obj->title;
    
});



// 
Route::get('/setTitle', function() {
   
    $obj = Post::findOrFail(5);

    $obj->title = 'javascript';

    $obj->save();
    
});

});