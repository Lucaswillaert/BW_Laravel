@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card ">
                    <div class="mx-auto w-1/2">
                       
                        <div class="post-container mx-auto bg-white rounded shadow-md mt-6 px-4 py-4 w-3/4">
                            <h2
                                class="subtitle mb-4 mt-4 text-xl font-bold leading-none tracking-tight text-gray-700 md:text-2xl lg:text-3xl">
                                {{ $entry->title }}
                            </h2>

                            <div>
                                <p>{{ $entry->message }}</p>
                            </div>
                            <div>
                                <small>{{ $entry->created_at->format('d/m/y') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="mx-auto w-1/3 mt-8">
                        <a href="{{ route('journal.index') }}"
                            class="btn btn-primary bg-gray-500 hover:bg-gray-400 d-700 text-white font-bold py-2 px-4 rounded mt-8 ml-8 mb-5">Terug</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
