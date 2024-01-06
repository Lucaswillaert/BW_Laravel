@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="container">
                        <div class="row justify-content-center ">


                            <!-- Profile Cards -->
                            @foreach ($users as $user)

                                <body class="bg-gray-100">
                                    <a href="{{ route('profile.show', $user->id) }}">
                                    <div class="max-w-lg mx-auto my-10 bg-white rounded-lg shadow-md p-5">
                                        <img class="w-32 h-32 rounded-full mx-auto" src="https://picsum.photos/200"
                                            alt="Profile picture">
                                        <h2 class="text-center text-2xl font-semibold mt-3">{{ $user->name }}</h2>
                                    </div>
                                    </a>
                                </body>
                            @endforeach
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
