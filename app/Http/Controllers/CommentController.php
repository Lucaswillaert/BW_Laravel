<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    
    public function store (Request $request, Post $post){


        $comment =new Comment ;
        $comment -> comment = $request -> comment;
        $comment -> user_id = auth()->id();
        $post -> comments() -> save($comment);

        return back();
    }
}
