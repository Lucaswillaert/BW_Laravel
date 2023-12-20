@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="container">
                        <div class="row justify-content-center ">
                                <div class="heading text-center font-bold text-2xl m-5 text-gray-800">New Quote</div>
                                <style>
                                    body {background:white !important;}
                                </style>
                                    <form action="{{ route('posts.store') }}" method="POST" class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl rounded-lg">
                                        @csrf
                                        <textarea name="message" class="description bg-gray-100 sec p-3 h-60 border border-gray-300 outline-none" spellcheck="false" placeholder="Describe everything about this post here"></textarea>
                                        
                                        <!-- buttons -->
                                        <div class="buttons flex">
                                            <a href="{{route('posts.index')}}" class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-auto">Cancel</a>
                                            <button type="submit" class="btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500">Post</button>
                                        </div>
                                    </form>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection