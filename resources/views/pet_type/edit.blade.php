@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Tipo de Mascota</h2>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('pet_type.index') }}" class="btn btn-primary">Regresar</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('pet_type.update', $petType->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div
                        class="form-group
                    @error('name')
                        has-error
                    @enderror">

                        <label for="name">Tipo de Mascota</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ $petType->name }}">
                        @error('name')
                            <span class="help-block text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('description') has-error  @enderror">
                        <label for="description">Descripción</label>
                        <textarea name="description" id="description" class="form-control" rows="3">{{ $petType->description }}</textarea>
                        @error('description')
                            <span class="help-block text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('img_url') has-error @enderror">
                        <label for="img_url">{{ __('Foto') }} </label>
                        <input type="file" name="img_url" id="img_url" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar Tipo de Mascota</button>
                </form>
            </div>
        </div>
    @endsection
