@extends('layouts.app')

@section('content')
<style>
    .card {
        border: none;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card-header {
        background-color: #007bff;
        color: #fff;
        padding: 15px;
    }

    .card-header h4 {
        margin: 0;
        font-size: 1.5rem;
    }

    .card-body {
        padding: 30px;
    }

    .card-body p {
        margin-bottom: 0;
        font-size: 1.1rem;
        color: #333;
    }
</style>


<section class="blog">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="titulo">Posts</h2>
                </div>
                <div class="col-12">
                    @foreach ($posts as $post)
                        <div class="card mb-4">
                            <div class="card-header bg-primary">
                                <h2 class="text-white">{{ $post->title }}</h2>
                            </div>
                            <div class="card-body">
                                <p>{{ Str::words($post->content, 20) }}</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('blogs.show', $post->id) }}" class="btn btn-primary">Leer mas</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection
