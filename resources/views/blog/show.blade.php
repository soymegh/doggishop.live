@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $blog->title }}</h4>
                    </div>
                    <div class="card-body">
                        <p>{{ $blog->content }}</p>
                    </div>
                
                    <div class="card-footer">
                        <a href="{{ route('blogs.post') }}" class="btn btn-primary">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
