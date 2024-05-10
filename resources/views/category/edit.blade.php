@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Categoría</h2>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('categories.index') }}" class="btn btn-primary">Regresar</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div
                        class="form-group
                        @error('name')
                            has-error
                        @enderror">

                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ $category->name }}">
                        @error('name')
                            <span class="help-block
                            text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div
                        class="form-group
                        @error('description')
                            has-error
                        @enderror">

                        <label for="description">Descripción</label>
                        <textarea name="description" id="description" class="form-control" rows="3">{{ $category->description }}</textarea>
                        @error('description')
                            <span class="help-block
                            text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div
                        class="form-group
                    @error('img_url')
                    has-error
                    @enderror">
                        <label for="img_url">Foto</label>
                        <img src="{{ asset('images/category/' . $category->img_url) }}" alt="" class="img-thumbnail rounded-circle mx-auto d-block " width="150px">
                        <input type="file" name="img_url" id ="img_url" class="form-control"
                            value="{{ $category->img_url }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
