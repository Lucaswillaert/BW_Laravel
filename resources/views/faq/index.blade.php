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
                        <section id="about-us">
                            <h2>About Us</h2>
                            <p>...</p>
                        </section>

                        <!-- FAQ Section -->
                        <section id="faq">
                            <h2>FAQ</h2>
                            <!-- Loop through FAQs -->
                            @foreach($faqs as $faq)
                                <details>
                                    <summary>{{ $faq->question }}</summary>
                                    <p>{{ $faq->answer }}</p>
                                </details>
                            @endforeach
                        </section>

                        <!-- Question Form Section -->
                        <section id="question-form">
                            <h2>Ask a Question</h2>
                            <form method="POST" action="{{ route('questions.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="question">Question</label>
                                    <textarea class="form-control" id="question" name="question" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection