@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit Blog Post</h1>
                <a href="{{ route('blogs.index') }}">Regresar</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form method="POST" action="{{ route('blogs.update', $blog->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                name="title" value="{{ old('title', $blog->title) }}" required autocomplete="title" autofocus>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{-- slug --}}
                    <div class="form-group row">
                        <label for="slug" class="col-md-4 col-form-label text-md-right">Slug</label>
                        <div class="col-md-6">
                            <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror"
                                name="slug" value="{{ old('slug', $blog->slug) }}" required autocomplete="slug" autofocus>
                            @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="content" class="col-md-4 col-form-label text-md-right">Content</label>
                        <div class="col-md-6">
                            <textarea id="content" class="form-control @error('content') is-invalid @enderror" name="content" required
                                autocomplete="content">{{ old('content', $blog->content) }}</textarea>
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group
                        row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Guardar cambios
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection