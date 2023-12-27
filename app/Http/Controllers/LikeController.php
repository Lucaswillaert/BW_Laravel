<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;
class LikeController extends Controller
{
  
public function store(Post $post)
{
    $like = $post->likes()->where('user_id', auth()->id())->first();

    if ($like) {
        $like->delete();
    } else {
        $post->likes()->create(['user_id' => auth()->id()]);
    }

    return back();
}



}
