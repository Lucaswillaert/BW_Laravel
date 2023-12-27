@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="container">

                        <!-- Quote of the day dat veranderd bij het herladen van de pagina -->
                        <div class="container mx-auto px-4">
                            <div class="post-container mx-auto bg-white rounded shadow-md mt-6 px-4 py-4 w-1/2">
                                <p class="text-lg">{{ $quote }}</p>
                                <p class="text-right">— {{ $author }}</p>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="flex justify-center my-4">
                                <a href="{{ route('posts.create') }}"
                                    class="btn btn-primary  mb-4 border-2 border-gray-500  rounded-lg px-4 py-2">Quote
                                    posten </a>
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
                                

                                    <div class="flex items-center border-2 border-gray-200 p-2">
                                        <p class = "mr-5">{{ $post->likes->count() }} likes</p>
                                        <form method="POST" action="{{ route('likes.store', $post->id) }}">
                                            @csrf
                                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Like</button>
                                        </form>
                                    </div>

                                    @foreach ($post->comments as $comment)
                                        <div class="flex items-center bg-gray-200 rounded shadow-md mt-1 px-3 py-3 ">
                                            <p>{{ $comment->comment }}</p>
                                        </div>
                                    @endforeach
                               

                                <div class="post-container  bg-white rounded shadow-md mt-6 px-4 py-4 w-1/2">
                                    <!-- Comment form -->
                                    <form method="POST" action="{{ route('comments.store', $post) }}">
                                        @csrf
                                        <textarea name="comment"></textarea>
                                        <button type="submit">Post Comment</button>
                                    </form>
                                </div>


                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
