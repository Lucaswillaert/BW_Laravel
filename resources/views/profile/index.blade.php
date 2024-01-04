@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="container">
                        <div class="row justify-content-center ">

                            <!-- Profile Card -->

                            <body class="bg-gray-100">
                                <div class="max-w-lg mx-auto my-10 bg-white rounded-lg shadow-md p-5">
                                    <img class="w-32 h-32 rounded-full mx-auto" src="https://picsum.photos/200"
                                        alt="Profile picture">
                                    <h2 class="text-center text-2xl font-semibold mt-3">{{ $user->name }}</h2>

                                    <div class="flex justify-center mt-5">
                                        <a href="#" class="text-blue-500 hover:text-blue-700 mx-3">edit name</a>
                                        <a href="#" class="text-blue-500 hover:text-blue-700 mx-3">About yourself</a>
                                        <a href="{{ route('password.edit') }}"
                                            class="text-blue-500 hover:text-blue-700 mx-3">edit password</a>
                                    </div>

                                    <div class="mt-5">
                                        <h3 class="text-xl font-semibold">Birthday</h3>
                                        <p class="text-gray-600 mt-2">{{ $user->date_of_birth }}</p>
                                    </div>

                                    <div class="mt-5">
                                        <h3 class="text-xl font-semibold">About me</h3>
                                        <p class="text-gray-600 mt-2">{{ $user->about_me }}</p>
                                    </div>
                                </div>
                            </body>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
