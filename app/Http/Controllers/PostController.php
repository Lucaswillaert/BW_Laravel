<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Post;
use App\Models\Comment;




class PostController extends Controller
{
    public function index()
    {

        //telkens bij herladen pagina nieuwe quote
        $posts = Post::with(['likes' , 'comments' , 'user']) ->orderBy('created_at' , 'desc')->paginate(5);
        $response = Http::get('https://zenquotes.io/api/random');
        $quoteData = $response->json(0);
        $quote = $quoteData['q'];
        $author = $quoteData['a'];

        return view('posts.index', ['posts' => $posts, 'quote' => $quote, 'author' => $author]);
        // geeft alle posts weer in de posts variabele 
    }

    public function show(Post $post)
    {
        $post->load('comments'); // Eager load the comments
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'message' => 'required|max:255',
        ]);
        //foutmelding als er geen message is ingevuld
        $post = new Post();
        $post->message = $request->message;
        $post->user_id = auth()->user()->id;
        $post->created_at;
        $post->save();

        return redirect()->route('posts.index');
    }
}
