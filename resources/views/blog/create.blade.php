@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class=" col-md-12 border rounded-5 mt-5 ">
                <div class="row mt-3 mb-3  ml-1 mr-3">
                    <div class="col">
                        <h2>Crear un nuevo post</h2>
                    </div>
                    <div class="col text-right  ">
                        <a href="{{ route('blogs.index') }}" class="btn btn-primary rounded-pill">Regresar</a>
                    </div>
                </div>

                <form class="mb-4 mx-4" method="POST" action="{{ route('blogs.store') }}">
                    @csrf

                    <div class="row align-items-center">
                        <div class="col-6">
                            <div class="form-group row">
                                <label for="title" class="">Title</label>
                                <div class="">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            {{-- slug --}}
                            <div class="form-group row">
                                <label for="slug" class="">Slug</label>
                                <div class="">
                                    <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror"
                                        name="slug" value="{{ old('slug') }}" required autocomplete="slug" autofocus>
                                    @error('slug')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    

                    <div class="form-group row">
                        <label for="content"   >Content</label>
                        <div class="">
                            <textarea id="content" class="form-control @error('content') is-invalid @enderror" name="content" required
                                autocomplete="content" rows="5">{{ old('content') }}</textarea>
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="">
                            <button type="submit" class="btn btn-success rounded-pill pl-4 pr-4 fw-bold">
                                Crear Blog Post
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
