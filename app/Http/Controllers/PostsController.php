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

        return response()->json($post);
    }

    // Create Post Function
    public function create(Request $request){
        $post - Post::create($request->all());

        return response()->json($post);
     }


    // Update Post Function
     public function update(Request $request, $id)
     {
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->description->$request->input('description');
        $post->views->$request->input('views');

        return response()->json('Successfully update post', $post);
    }


    // Delete Post By Id
    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();

        return response()->json('Successfully Delete Post', $post);
    }
}



