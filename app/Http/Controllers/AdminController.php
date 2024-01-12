<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\Post;
use App\Models\Contact;




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

   
    
    public function makeAdmin(Request $request, User $user)
    {
        $user->role = 'admin';
        $user->save();

        return back()->with('status', 'User made admin');
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
