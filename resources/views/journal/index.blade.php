@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mx-auto w-3/4">
                    <table class="table-auto w-full text-left">

                        <div class="row justify-content-center">
                            <div class="flex justify-center my-4">
                                <a href="{{route('journal.create')}}"  class="btn btn-primary  mb-4 border-2 border-gray-500  rounded-lg px-4 py-2">New entry </a>
                            </div>
                        </div>
                        <thead>
                            <h2
                                class="subtitle mb-4 mt-8 text-xl font-bold leading-none tracking-tight text-gray-700 md:text-2xl lg:text-3xl">
                                Journal entry
                            </h2>
                            <tr>
                                <th>Date</th>
                                <th>Titel</th>
                                <th>message</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($entries as $entry)
                                <tr class="border-b-2 transition duration-200 hover:bg-gray-200 cursor-pointer">
                                    <td class="p-2">
                                        <a href="{{ route('journal.show', $entry->id) }}">
                                            {{ date('d-m-Y', strtotime($entry->created_at)) }}
                                        </a>
                                    </td>
                                    <td class="p-2">
                                        <a href="{{ route('journal.show', $entry->id) }}">
                                            {{ $entry->title }}
                                        </a>
                                    </td>
                                    <td class="p-2 overflow-hidden overflow-ellipsis">
                                        <a href="{{ route('journal.show', $entry->id) }}">
                                            {{ $entry->message }}
                                        </a>
                                    </td>
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
