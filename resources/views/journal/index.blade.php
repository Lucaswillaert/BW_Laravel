@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <table class="table-auto w-full text-left">
                        <thead>
                            <h2
                                class="subtitle mb-4 text-xl font-bold leading-none tracking-tight text-gray-700 md:text-2xl lg:text-3xl">
                                 Journal entry
                            </h2>
                            <tr>
                                <th>Date</th>
                                <th>Titel</th>
                                <th>Mood</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($entry as $entry)
                                <tr class="border-b-2 transition duration-200 hover:bg-gray-100 cursor-pointer">
                                    <td class="p-2">
                                        <a href="{{ route('entry.show', ['id' => $entry->id]) }}">
                                            {{ $entry->name }}
                                        </a>
                                    </td>
                                    <td class="p-2">{{ $entry->owner->name }}</td>
                                   
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
