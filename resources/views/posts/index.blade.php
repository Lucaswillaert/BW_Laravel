@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="flex justify-center my-4">
                                <a href="{{route('posts.create')}}"  class="btn btn-primary  mb-4 border-2 border-gray-500  rounded-lg px-4 py-2">Quote posten </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @foreach ($posts as $post)
                         <div class="post-container mx-auto bg-white rounded shadow-md mt-6 px-4 py-4 w-1/2">   
                            <div>
                                <p>{{ $post->message }}</p>
                            </div>
                            <div>
                                <small>{{ $post->created_at->format('d/m/y') }} by {{ $post->user_id }}</small>
                            </div>
                        </div>
                        @endforeach
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
