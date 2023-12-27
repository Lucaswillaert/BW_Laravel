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
                        <!-- About Us Section -->
                        <div class="post-container mx-auto bg-white rounded shadow-md mt-6 px-4 py-4 w-1/2">
                            <section id="about-us">
                                <h2 class= "text-center"> <strong>About Us </strong></h2>
                                    <p class="text-center">Welcome to JournalMe, a unique online platform designed to elevate your self-expression and reflection. At JournalMe, we believe that words have the power to inspire, connect, and transform. This isn't just a space for posting quotes; it's a sanctuary for crafting the narrative of your life through personal journal entries. Whether you're capturing the essence of your everyday experiences, expressing your innermost thoughts, or simply chronicling the moments that shape you, JournalMe is your digital canvas for introspection and creativity. Join our community of wordsmiths and storytellers, where every entry is a brushstroke in the masterpiece of your life. Embrace the art of self-discovery with JournalMe, where your words find their home.</p>
                                    <p>repo </p>
                                </section>
                        </div>

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
                                            <a href="{{ route('faq.index') }}"
                                                class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-auto">Cancel</a>
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
