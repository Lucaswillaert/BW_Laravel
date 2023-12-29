@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                       <!-- CONTENT ADMIN PAGE -->
                            <!-- wat wil ik hebben staan: aankrijgen en toevoegen van FAQ, zetten in categorie (quote vragen , journal vragen , profiel vragen)  -->
                            <table class="table-auto w-full text-left">
                                <thead>
                                    <tr>
                                        <th class="p-2 min-w-1/3">User Email</th>
                                        <th class="p-2">Question</th>
                                        <th class="p-2">Date</th>
                                        <th class="p-2">Publish</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($faqs as $faq)
                                        <tr class="border-b-2 transition duration-200 hover:bg-gray-100 cursor-pointer">
                                            <td class="p-2">{{ $faq->user->email }}</td>
                                            <td class="p-2">{{ $faq->question }}</td>
                                            <td class="p-2">{{ $faq->created_at }}</td>
                                            <td class="p-2">
                                                <form method="POST" action="{{ route('faqs.publish', $faq->id) }}">
                                                Route::post('/faqs/{faq}/publish', [App\Http\Controllers\FaqController::class, 'publish'])->name('faqs.publish');    @csrf
                                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                        {{ $faq->published ? 'Unpublish' : 'Publish' }}
                                                    </button>
                                                </form>
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