@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container mx-auto">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <!-- CONTENT ADMIN PAGE -->
                        <div>
                            <div class="container mx-auto px-6">
                                <h1 class="text-center text-3xl">FAQ vragen</h1>
                                <table class="table-auto w-full text-left">
                                    <thead>
                                        <tr>
                                            <th class="p-2 min-w-1/3">Gebruiker E-mail</th>
                                            <th class="p-2">Vraag</th>
                                            <th class="p-2">Datum</th>
                                            <th class="p-2">Publiceren</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Loop through all the faq's -->
                                        @foreach ($faqs as $faq)
                                            <tr class="border-b-2 transition duration-200 hover:bg-gray-100 cursor-pointer">
                                                <td class="p-2"> <a
                                                        href="{{ route('faqs.answer', $faq->id) }}">{{ $faq->user->email }}
                                                    </a></td>
                                                <td class="p-2">
                                                    <a href="{{ route('faqs.answer', $faq->id) }}">{{ $faq->question }}
                                                    </a>
                                                </td>
                                                <td class="p-2"> <a
                                                        href="{{ route('faqs.answer', $faq->id) }}">{{ $faq->created_at }}
                                                    </a></td>
                                                <td class="p-2">
                                                    <form method="POST" action="{{ route('faqs.publish', $faq->id) }}">
                                                        @csrf
                                                        <button type="submit"
                                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                            {{ $faq->published ? 'Niet publiceren' : 'Publiceren' }}
                                                        </button>
                                                    </form>
                                                </td>
                                                <!-- Delete Button --> 
                                                <td class="p-2">
                                                    <form method="POST" action="{{ route('faqs.destroy', $faq->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <br>




                            <div class="container mx-auto px-6">
                                <h1 class="text-center text-3xl">Contactformulieren</h1>
                                <table class="table-auto w-full text-left">
                                    <thead>
                                        <tr>
                                            <th class="p-2 min-w-1/3">Gebruiker E-mail</th>
                                            <th class="p-2">Onderwerp</th>
                                            <th class="p-2">Tijdstip</th>
                                            <th class="p-2">Bericht</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <!-- Loop through all the contacts --> 
                                        @foreach ($contacts as $contact)
                                            <tr class="border-b-2 transition duration-200 hover:bg-gray-100 cursor-pointer">
                                                <td class="p-2"> <a
                                                        href="{{ route('contact.answer', $contact->id) }}">{{ $contact->email }}</a>
                                                </td>
                                                <td class="p-2"> <a
                                                        href="{{ route('contact.answer', $contact->id) }}">{{ $contact->subject }}
                                                    </a></td>
                                                <td class="p-2"> <a
                                                        href="{{ route('contact.answer', $contact->id) }}">{{ $contact->created_at }}
                                                    </a> </td>
                                                <td class="p-2"> <a
                                                        href="{{ route('contact.answer', $contact->id) }}">{{ $contact->message }}
                                                    </a> </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
