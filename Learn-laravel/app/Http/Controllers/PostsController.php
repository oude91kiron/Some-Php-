<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest;
use App\Post;
use App\User;



class PostsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        /**
         * To pass data to view we save data to class object
         * and call compact() function as second arg for view() method.
         */
        
         /**
          * latest() is scope function we created in the class
          *  Post to shortcut a snippet of code.
          */
         $posts = Post::latest()->get();

        // after we sotre data we redirct the request to here
        // where the controller request a view form index page.
        return view('posts.index', compact('posts'));
    }
//---------------------------------------------------------------------------------------------
    



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    } 




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {

        // 8......................................
        // Persisting file data into the database.
        
        // store requested data to input variable.
        $input = $request->all();
        // check if the requested data has a file.
        if($file = $request->file('file')) {
            // store the file name to $name variable.
            $name = $file->getClientOriginalName();
            // store the file using move('storageFolder', 'fileName') method
            $file->move('images', $name);
        
            $input['path'] = $name; 
        }
        // create post record in the database.
        Post::create($input);

        return redirect('/posts'); 


        // 7......................................
        // // create $file object by calling file method with $request object    
        // $file = $request->file('file');

        // return $file->getSize(); // return file size.
 
        // return $file->getClientOriginalName(); // return file name.



        // Note: after creating a request class we can validate data by
        // passing an opject of a request class where we define the validation rules.  

        // 6...................................... 19/127 Basic validation.
        // Use validate() function to validate data (data validation before data storing    )

        // $this->validate($request, [

        //     // check validation rules on laravel website to learn more.
        //     'title'=>'required|max:16',
        //     'content'=>'required|max:50'
        // ]);


        // __________ Things we can do __________

        // // 1..................................
        // // This gonna return the all requests. 
               
        //   return $request->all();
        

        // // 2..................................
        // // Return title from a request.
        
        // return $request->title;

        
        // // 3..................................
        // // create in the database.
        // Post::create($request->all());
        
        // // dd($request->all());

        // // Then redirect to index method in the controller.
        // return redirect('/posts'); 

        // // 4..................................
        // // create array $input 

        // $input = $request->all();

        // //dd($input); 
        // $input['title'] = $request->title;

        // Post::create($request->all());


        // // 5..................................
        // // create object save coming title from post
        // // to the object and save the object to the table posts.

        // $post = new Post;

        // $post->title = $request->title;

        // $post->save();

        
    }
//---------------------------------------------------------------------------------------------





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Select a specific post of the id.
        $post = Post::findOrFail($id);
        
        
        // reteun show page from the view.
        return view('posts.show', compact('post'));
    }
//---------------------------------------------------------------------------------------------






    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = Post::findOrFail($id);

        //
        return view('posts.edit', compact('post'));
    }
//---------------------------------------------------------------------------------------------





    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // find the post of the id.
        $post = Post::findOrFail($id);

        // update the old data with the new comes in the request.
        $post->update($request->all());

        return redirect('/posts');
    }
//---------------------------------------------------------------------------------------------






    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // find and store a post to a variable
        $post = Post::findOrFail($id);

        // using delete() method delete that post.
        $post->delete();

        // redirect to index page.
        return redirect('/posts');   

    }
//---------------------------------------------------------------------------------------------








    /**
     * Show the contact page.
     *
     * @param  none
     * @return \Illuminate\Http\Response
     */
    public function contact() {

        $people = ['Wael', 'hasan', 'ahmad' , 'mohamad' , 'odey'];

        return view('contact', compact('people'));
    }









    public function show_post($id,$name, $email) {

        // by using with() method we can pass data to view.
        //return view('post')->with('id', $id);

        // to pass multiple parameters or array of parameters
        // we can use function called "compact"  to do that.
        return view('post', compact('id', 'name', 'email'));
    }
}


