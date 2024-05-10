@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Nueva Categoría</h2>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('categories.index') }}" class="btn btn-primary">Regresar</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group
                        @error('name')
                            has-error
                        @enderror">

                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name') }}">
                        @error('name')
                            <span class="help-block
                            text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group
                        @error('description')
                            has-error
                        @enderror">
                        <label for="description">Descripción</label>
                        <textarea name="description" id="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="help-block
                            text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- foto --}}
                    <div class="form-group">
                        <label for="img_url">Imagen</label>
                        <input type="file" name="img_url" id="img_url" class="form-control" 
                            value="{{ old('img_url') }}" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
