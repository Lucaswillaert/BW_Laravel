@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="post-container mx-auto bg-white rounded shadow-md mt-6 px-4 py-4 w-1/2">

                            <div class="container mx-auto px-6 py-8 lg:py-16">
                                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">
                                answer the question     
                                </h2>
                                    <form method="POST" action="{{ route('contact.answer', $contact->id) }}" class="space-y-8">
                                    @csrf
                                    <div>
                                        <input type="text" name="subject" id="subject"
                                            class="block p-3 w-full text-sm text-gray-900 bg-gray-50"
                                            value="{{ $contact->email }}" required readonly>
                                    </input>
                                    </div>
                                    <div>
                                        <input type="text" name="subject" id="subject"
                                            class="block p-3 w-full text-sm text-gray-900 bg-gray-50"
                                            value="{{ $contact->subject }}" required readonly>
                                    </input>
                                    </div>
                                   
                                    <div>
                                        <input type="text" name="subject" id="subject"
                                            class="block p-3 w-full text-sm text-gray-900 bg-gray-50"
                                            value="{{ $contact->message }}" required readonly>
                                    </input>
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label for="message"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your
                                            message</label>
                                        <textarea id="answer" name="answer" rows="6"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            value = "{{$contact->answer}}"></textarea>
                                    </div>

                                    <div>
                                        <button type="submit"
                                            class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Send
                                            message</button>
                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                    </div 
                                </form>
                            </div>
                            </section>

                            <div class="mx-auto w-1/3 mt-8">
                                <a href="{{ route('admin.index') }}"
                                    class="btn btn-primary bg-gray-500 hover:bg-gray-400 d-700 text-white font-bold py-2 px-4 rounded mt-8 ml-8 mb-5">Terug</a>
                            </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
