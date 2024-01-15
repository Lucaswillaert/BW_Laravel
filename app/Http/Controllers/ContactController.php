<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $contact = new Contact;

        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
    
        $contact->save();
    
    
        return redirect()->back()->with('success', 'Form submitted!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        $contacts = Contact::all();
        return view('index', ['contacts' => $contact]);
    }
    public function answer(Contact $contact)
    {
        return view('about.answer', ['contact' => $contact]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
