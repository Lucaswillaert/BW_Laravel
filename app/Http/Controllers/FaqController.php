<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
{
    $faqs = Faq::where('published', true)->get();
    return view('faq.index', ['faqs' => $faqs]);
}


public function show($id)
{
    $faq = Faq::findOrFail($id);
    return view('faq.show', ['faq' => $faq]);
}



public function store(Request $request){
    $validated = $request->validate([
        'question' => 'required|max:255',
    ]);
    //foutmelding als er geen message is ingevuld
    $faq = new Faq();
    $faq->question = $request->input('question');
    $faq->user_id = auth()->user()->id;
    $faq->published = false;
    $faq->created_at;
    $faq->save();

    return redirect()->route('faq.index') -> with ('success', 'Question added');
}



}

