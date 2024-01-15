<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\Entry;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entries =auth()->user()->entries;


        return view('journal.index' , ['entries' => $entries]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('journal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            
            $validated = $request->validate([
                'message' => 'required|max:255',
            ]);
            //foutmelding als er geen message is ingevuld
            $entry = new Entry();
            $entry->title = $request->title;
            $entry->message = $request->message;
            $entry->user_id = auth()->user()->id;
            $entry->created_at;
            $entry->save();
    
            return redirect()->route('journal.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $entry = Entry::find($id);
      
        return view('journal.show', ['entry' => $entry]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
