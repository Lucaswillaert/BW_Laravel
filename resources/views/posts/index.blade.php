@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 min-h-screen ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="container">

                        <!-- Quote of the day dat veranderd bij het herladen van de pagina -->
                        <div class="container mx-auto px-4">
                            <div
                                class="post-container mx-auto bg-custom-blue rounded shadow-md mt-6 px-4 py-4 w-full sm:w-1/2 lg:w-1/3">
                                <img class="w-full h-64  rounded shadow-md mx-auto" src="https://picsum.photos/200"
                                    alt="quotes">
                                <p class="text-lg">{{ $quote }}</p>
                                <p class="text-right">— {{ $author }}</p>
                            </div>
                        </div>
                        <!-- Quote of the day dat veranderd bij het herladen van de pagina -->
                        @auth
                            <div class="row justify-content-center">
                                <div class="flex justify-center my-4">
                                    <a href="{{ route('posts.create') }}"
                                        class="inline-block bg-white hover:bg-gray-100 text-black font-semibold text-sm py-2 px-4 rounded shadow">Quote
                                        posten </a>
                                </div>
                            </div>
                        @endauth
                    </div>
                    <!-- Loop door alle posts heen -->
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @foreach ($posts as $post)
                            <div
                                class="post-container relative mx-auto bg-custom-blue rounded shadow-md mt-4 px-4 py-4 w-full sm:w-1/2 lg:w-1/3">
                                <div class="absolute top-0 right-0">
                                    @if (Auth::check() && Auth::user()->is_admin)
                                        <form method="POST" action="{{ route('posts.destroy', $post) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded fas fa-trash mt-2 mr-2 ">Delete</button>
                                        </form>
                                    @endif
                                </div>
                                <div>
                                    <p>{{ $post->message }}</p>
                                </div>
                                <div>
                                    <small> 0n {{ $post->created_at->format('d/m/y') }} by
                                        <strong>{{ $post->user->name }}</strong></small>
                                </div>
                                <div class="flex items-center border-custom-dark p-2">
                                    <p class="bg-blue-500 text-white font-bold py-1 px-2 rounded  mr-2">
                                        {{ $post->likes->count() }} <strong>likes</strong></p>
                                    <form method="POST" action="{{ route('likes.store', $post->id) }}">
                                        @csrf
                                        <button type="submit"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Like</button>
                                    </form>
                                </div>
                                <!-- Loop door alle comments heen -->
                                <!-- Alleen ingelogde gebruikers kunnen een comment plaatsen -->
                                @auth
                                    @foreach ($post->comments as $comment)
                                        <div class="flex items-center bg-gray-200 rounded-xl shadow-md mt-1 px-4 py-3 ">
                                            <div class="p-3 bg-white rounded-xl shadow-md flex items-center space-x-4">
                                                <p>{{ $comment->user->name }}</p>
                                            </div>
                                            <p class="ml-4">{{ $comment->comment }}</p>
                                        </div>
                                    @endforeach
                                @endauth
                                <!-- Comment form -->
                                <div class="post-container bg-custom-light rounded shadow-md mt-6 px-2 py-2 w-full">
                                    @auth
                                        <form method="POST" action="{{ route('comments.store', $post) }}"
                                            class="w-full bg-white rounded-lg px-4 pt-2">
                                            @csrf
                                            <div class="flex flex-wrap -mx-3 mb-6">
                                                <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add a new comment</h2>
                                                <div class="w-full md:w-full px-3 mb-2 mt-2">
                                                    <input type="text"
                                                        class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                                                        name="comment" placeholder='Type Your Comment' required </input>
                                                    
                                                    </div>
                                                    <div class="w-full md:w-full flex items-start md:w-full px-3">
                                                        <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">


                                                        </div>
                                                        <div class="-mr-1">
                                                            <input type='submit'
                                                                class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 mb-2 hover:bg-gray-100"
                                                                value='Post Comment'>
                                                        </div>
                                                    </div>
                                                </div>
                                        </form>
                                    @endauth
                                </div>
                            </div>
                    </div>
                    @endforeach
                    <!-- Paginatie links -->

                </div>
                <div class="mt-4 flex justify-center">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
