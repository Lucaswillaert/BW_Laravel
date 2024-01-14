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
                            <div>
                                <a href="{{ route('profile.show', $user->id) }}" style="z-index: 1;">
                                    <div class="max-w-lg mx-auto my-10 bg-white rounded-lg shadow-md p-5">
                                        <img class="w-32 h-32 rounded-full mx-auto" src="https://picsum.photos/200"
                                            alt="Profile picture">
                                        <div class="flex justify-center items-center mt-3">
                                            <h2 class=" text-center text-2xl font-semibold mr-4">{{ $user->name }}</h2>
                                            @if (Auth::user()->is_admin)
                                                <form action="{{ route('admin.makeAdmin', $user->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 text-sm rounded">Maak Admin</button>
                                                </form>
                                            @endif
                                        </div>
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
