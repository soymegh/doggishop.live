@extends('layouts.app')

@section('content')
    <div class="container">
     
        <div class="row">
            <div class=" col-md-12 border rounded-5 mt-5 ">
                <div class="row mt-4 mb-3  ml-1 mr-3">
                    <div class="col">
                    <h2>Ver Mascotas</h2>
                    </div>
                    <div class="col text-right  ">
                        <a href="{{ route('categories.index') }}" class="btn btn-primary rounded-pill">Regresar</a>
                    </div>
                    
                </div>
                <div class="mb-4  ml-3 mr-3" >
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
    </div>
    
    
@endsection