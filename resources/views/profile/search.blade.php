@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="container">
                        <div class="row justify-content-center ">

                            @if (session('status'))
                                <div class="bg-blue-500 text-white px-4 py-3 border-t-4 border-blue-700 rounded-b shadow-md"
                                    role="alert">
                                    <div class="flex">
                                        <div class="py-1"><svg class="fill-current h-6 w-6 text-blue-500 mr-4"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                                            </svg></div>
                                        <div>
                                            <p class="font-bold">{{ session('status') }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif


                            <!-- Profile Cards in the search field  -->
                            @foreach ($users as $user)
                                <div>
                                    <a href="{{ route('profile.show', $user->id) }}" style="z-index: 1;">
                                        <div class="max-w-lg mx-auto my-10 bg-white rounded-lg shadow-md p-5">
                                            <img class="w-32 h-32 rounded-full mx-auto" src="https://picsum.photos/200"
                                                alt="Profile picture">
                                            <div class="flex justify-center items-center mt-3">
                                                <h2 class=" text-center text-2xl font-semibold mr-4">{{ $user->name }}
                                                </h2>
                                                @if (Auth::user()->is_admin)
                                                    <form action="{{ route('admin.makeAdmin', $user->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit"
                                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 text-sm rounded">Maak
                                                            Admin</button>
                                                    </form>
                                                @endif
                                               
                                            </div>
                                            <p class=" text-gray-600 mt-2">{{ $user->about_me }}</p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
