@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Ver Tipo de Mascota</h2>
            <a href="{{ route('pet_type.index') }}" class="link-primary">Regresar</a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ $petType->name }}" readonly> 
                </div>
                <div class="form-group
                    @error('description')
                        has-error
                    @enderror">
                    <label for="description">Descripción</label>
                    <textarea class="form-control" id="description" name="description"
                        rows="3" readonly>{{ $petType->description }}</textarea>
                </div>
            </div>
        </div>
    </div>
@endsection