@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Ver Mascota</h2>
            <a href="{{ route('pets.index') }}" class="link-primary">Regresar</a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="name">SKU</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ $pet->name }}" readonly>
                </div>
                <div class="form-group
                    @error('breed')
                        has-error
                    @enderror">
                    <label for="breed">Raza</label>
                    <input type="text" class="form-control" id="breed" name="breed"
                        value="{{ $pet->breed }}" readonly>
                </div>
                <div class="form-group
                    @error('gender')
                        has-error
                    @enderror">
                    <label for="gender">Genero</label>
                    <input type="text" class="form-control" id="gender" name="gender"
                        value="{{ $pet->gender }}" readonly> 
                </div>
                <div class="form-group
                    @error('age')
                        has-error
                    @enderror">
                    <label for="age">Edad</label>
                    <input type="text" class="form-control" id="age" name="age"
                        value="{{ $pet->age }}" readonly>
                </div>
                <div class="form-group
                    @error('price')
                        has-error
                    @enderror">
                    <label for="price">Precio</label>
                    <input type="text" class="form-control" id="price" name="price"
                        value="{{ $pet->price }}" readonly>
                </div>
            </div>
        </div>
    </div>
    
    
@endsection