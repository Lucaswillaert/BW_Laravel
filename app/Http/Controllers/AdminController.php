<?php

namespace App\Http\Controllers;




use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\Post;
use App\Models\Contact;
use App\Models\User;
use App\Models\Comment;





class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::all();
        $contacts = Contact::all();
        return view('admin.index', ['faqs' => $faqs , 'contacts' => $contacts]);
    }

   
    
    public function makeAdmin( User $user)
    {
        if ($user->is_admin === 1) {
            $user->is_admin = 0;
            $message = 'Admin rechten zijn ontnomen.';
        } else {
            $user->is_admin = 1;
            $message = 'De gebruiker is nu een admin.';
        }
        $user->save();
    
        return back()->with('status', $message);
    }
   
   
    public function destroy(Post $post)
    {

        // Delete all comments that belong to the post
        foreach ($post->comments as $comment) {
            $comment->delete();
        }

        // Then delete the post
        $post->delete();

        return redirect()->route('posts.index');
    }
}
