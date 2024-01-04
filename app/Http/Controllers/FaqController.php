<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::where('published', 1) ->get();
        return view('faq.index', ['faqs' => $faqs]);
    }


    public function show($id)
    {
        $faq = Faq::findOrFail($id);
        return view('faq.show', ['faq' => $faq]);
    }



    public function store(Request $request)
    {
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

        return redirect()->route('faq.index')->with('success', 'Question added');
    }

    public function publish(Faq $faq)
    {
        $faq->published = !$faq->published;
        $faq->save();

        return back();
    }

    public function destroy($id)
{
    $faq = Faq::find($id);
    $faq->delete();

    return redirect()->route('admin.index')->with('success', 'FAQ deleted');
}


    public function answer($id)
    {
        $faq = Faq::findOrFail($id);
        return view('faq.answer', ['faq' => $faq ,]);
    }


    public function storeAnswer(Request $request, $id)
    {
        $faq = Faq::find($id);

        $faq->answer = $request->input('answer');
        $faq->save();

        return redirect()->route('faq.index')->with('success', 'Answer added');
    }
}
