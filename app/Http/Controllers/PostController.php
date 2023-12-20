<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
       
        $posts = Post::all();

        return view ('posts.index', ['posts' => $posts]);
        // geeft alle posts weer in de posts variabele 
    }

    public function create(){
        return view ('posts.create');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'message' => 'required|max:255',
        ]);
        $post = new Post();
        $post->message = $request->message;
        $post->user_id = auth()->user()->id;
        $post->created_at;
        $post->save();

        return redirect()->route('posts.index');
    }
}
