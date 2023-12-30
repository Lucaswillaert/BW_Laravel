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
                        <!-- FAQ Section -->
                        <section id="faq">

                            <div class="post-container mx-auto bg-white rounded shadow-md mt-6 px-2 py-2 w-1/5">
                                <h2 class= "text-center"> <strong>Frequently asked questions</strong></h2>
                            </div>
                            <!-- Loop door FAQs -->
                            @foreach ($faqs as $faq)
                                <div class="post-container mx-auto bg-white rounded shadow-md mt-6 px-4 py-4 w-1/2">
                                    <details>
                                        <summary> <strong>{{ $faq->question }}</strong></summary>
                                        <hr>
                                        <div class = "mt-2">
                                            <p>{{ $faq->answer }}</p>
                                        </div>
                                    </details>
                                </div>
                            @endforeach
                        </section>
                        <!-- Question Form Section -->
                        <section id="question-form">

                            <div class="post-container mx-auto bg-white rounded shadow-md mt-6 px-2 py-2 w-1/5">
                                <h2 class= "text-center"> <strong>Ask a Question </strong></h2>
                            </div>
                            <div class="post-container mx-auto bg-white rounded shadow-md mt-6 px-4 py-4 w-1/2">
                                <section id="about-us">
                                    <form action="{{ route('faq.store') }}" method="POST"
                                        class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl rounded-lg">
                                        @csrf
                                        <textarea name="message" class="description bg-gray-100 sec p-3 h-60 border border-gray-300 outline-none w-full"
                                            spellcheck="false" placeholder="ask us any question you want to know"></textarea>

                                        <!-- buttons -->
                                        <div class="buttons flex">
                                            <a href="{{ route('faq.index') }}">
                                            <button type="submit"
                                                class="btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500">Post</button>
                                        </div>
                                    </form>

                                </section>
                            </div>


                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
