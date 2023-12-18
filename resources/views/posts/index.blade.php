@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Alle posts</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @foreach ($posts as $post)
                            <div>
                                <p>{{ $post->message }}</p>
                            </div>
                            <div>
                                <small>{{ $post->created_at->format('d/m/y') }} by {{ $post->user_id }}</small>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
