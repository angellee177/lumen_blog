<?php 

namespace App\Http\Controllers;

use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource
     * 
     * @return \Illuminate\Http\Response
     */

    

     public function __construct()
     {

     }

     public function index()
     {
        $posts = Post::latest()->paginate(5);

        return response()->json($posts, 200);
    }

    // Create Post Function
    public function create(Request $request)
    {   
        $this->validate($request, [
            'title' => 'required|min:5|unique:posts',
            'description' => 'required|min:25'
        ]);
        
        $post = Post::create($request->all());

        return response()->json($post, 201);
     }

    
    // Show Post function
    public function show($id)
    {
        $post = Post::find($id);
        if(empty($post)){
            return response()->json('No Data found', 420);
        }

        return response()->json($post, 200);
    }

    
    // Update Post Function
     public function update(Request $request, $id)
     { 
        $this->validate($request, [
            'title' => 'min:5|unique:posts',
            'description' => 'min:25'
        ]);
        $post = Post::find($id);
        $post->update($request->all());

        return response()->json($post, 201);
    }


    // Delete Post By Id
    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();

        return response()->json($post, 200);
    }
}




