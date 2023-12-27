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
                                <p class="text-center">Welcome to JournalMe, a unique online platform designed to elevate
                                    your self-expression and reflection. At JournalMe, we believe that words have the power
                                    to inspire, connect, and transform. This isn't just a space for posting quotes; it's a
                                    sanctuary for crafting the narrative of your life through personal journal entries.
                                    Whether you're capturing the essence of your everyday experiences, expressing your
                                    innermost thoughts, or simply chronicling the moments that shape you, JournalMe is your
                                    digital canvas for introspection and creativity. Join our community of wordsmiths and
                                    storytellers, where every entry is a brushstroke in the masterpiece of your life.
                                    Embrace the art of self-discovery with JournalMe, where your words find their home.</p>
                                <p>repo </p>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
