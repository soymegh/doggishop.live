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
        font-size: 1.2rem;
        color: #333;
    }
    .bg-blue{
        background-color: #00528c;
        border-color: #00528c;
    }
    .date{
        font-size: 1.12rem;
    }
</style>


<section class="blog">
        <div class="container">
            <div class="row">
                <div class="row my-4">
                    <div class="col-md-6">
                        <h2>Posts</h2>
                    </div>
                    <div class="col-md-6 text-end">
                    <a href="{{ route('home') }}" title="Regresar a home" class="btn btn-outline-primary rounded-circle"><i class=" py-3  fa-solid fa-home fa-xl"></i></a>
                    </div>
                </div>

                
                <div class="col-12 p-4">
                    @foreach ($posts as $post)
                        <div class="card mb-4 rounded-3">
                            <div class="card-header bg-blue rounded-top">
                                <h2 class="text-white">{{ $post->title }}</h2>
                            </div>
                            <div class="card-body">
                                <p>{{ $post->content}}</p> <br>
                                
                            </div>
                            <div class="card-footer">
                                <p class="date">{{date_format($post->created_at, "d/m/Y g:i a")}}</p>
                               
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{$posts->links()}}
        </div>
    </section>

@endsection
