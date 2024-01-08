@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="container">

                        <!-- Quote of the day dat veranderd bij het herladen van de pagina -->
                        <div class="container mx-auto px-4">
                            <div class="post-container mx-auto bg-custom-blue rounded shadow-md mt-6 px-4 py-4 w-1/2">
                                <img class="w-full h-64  rounded shadow-md mx-auto" src="https://picsum.photos/200"
                                    alt="quotes">
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
                            <div
                                class="post-container relative mx-auto bg-custom-blue rounded shadow-md mt-6 px-4 py-4 w-1/2">
                                <div class="absolute top-0 right-0">
                                    <form method="POST" action="{{ route('posts.destroy', $post) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded fas fa-trash ">Delete</button>
                                    </form>
                                </div>

                                <div>
                                    <p>{{ $post->message }}</p>
                                </div>
                                <div>
                                    <small> 0n {{ $post->created_at->format('d/m/y') }} by
                                        <strong>{{ $post->user->name }}</strong></small>
                                </div>



                                <div class="flex items-center border-custom-dark p-2">
                                    <p class = "mr-5">{{ $post->likes->count() }} <strong>likes</strong></p>
                                    <form method="POST" action="{{ route('likes.store', $post->id) }}">
                                        @csrf
                                        <button type="submit"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Like</button>
                                    </form>
                                </div>

                                @foreach ($post->comments as $comment)
                                    <div class="flex items-center bg-gray-200 rounded shadow-md mt-1 px-3 py-3 ">
                                        <p>{{ $comment->comment }}</p>
                                    </div>
                                @endforeach


                                <div class="post-container bg-custom-light rounded shadow-md mt-6 px-2 py-2 w-full">
                                    <!-- Comment form -->
                                    <form method="POST" action="{{ route('comments.store', $post) }}" class="w-full bg-white rounded-lg px-4 pt-2">
                                        @csrf
                                        <div class="flex flex-wrap -mx-3 mb-6">
                                            <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add a new comment</h2>
                                            <div class="w-full md:w-full px-3 mb-2 mt-2">
                                                <textarea class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="comment" placeholder='Type Your Comment' required></textarea>
                                            </div>
                                            <div class="w-full md:w-full flex items-start md:w-full px-3">
                                                <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                                                    
                                                   
                                                </div>
                                                <div class="-mr-1">
                                                    <input type='submit' class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" value='Post Comment'>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
