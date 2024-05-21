@extends('layouts.app')

@section('content')
<style>
    .files input {
        outline: 2px dashed #92b0b3;
        outline-offset: -10px;
        -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
        transition: outline-offset .15s ease-in-out, background-color .15s linear;
        padding: 120px 0px 85px 35%;
        text-align: center !important;
        margin: 0;
        width: 100% !important;
    }

    .files input:focus {
        outline: 2px dashed #92b0b3;
        outline-offset: -10px;
        -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
        transition: outline-offset .15s ease-in-out, background-color .15s linear;
        border: 1px solid #92b0b3;
    }

    .files {
        position: relative
    }

    .files:after {
        pointer-events: none;
        position: absolute;
        top: 60px;
        left: 0;
        width: 50px;
        right: 0;
        height: 56px;
        content: "";
        background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
        display: block;
        margin: 0 auto;
        background-size: 100%;
        background-repeat: no-repeat;
    }

    .color input {
        background-color: #f1f1f1;
    }

    .files:before {
        position: absolute;
        bottom: 10px;
        left: 0;
        pointer-events: none;
        width: 100%;
        right: 0;
        height: 57px;
        display: block;
        margin: 0 auto;
        color: #2ea591;
        font-weight: 600;
        text-transform: capitalize;
        text-align: center;
    }
</style>
    <div class="container">
        
        <div class="row">
            <div class=" col-md-12 border rounded-5 my-5 ">
                <div class="row mt-4 mb-3  ml-1 mr-3">
                    <div class="col">
                        <h2>Editar Mascota</h2>
                    </div>
                    <div class="col text-right  ">
                    <a href="{{ route('pets.index') }}" class="btn btn-primary rounded-pill">Regresar</a>
                    </div>
                </div>
                <form class="mb-4  mx-3"  action="{{ route('pets.update', $pet->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div
                        class="form-group
                        @error('name')
                            has-error
                        @enderror">
                        <label for="name">SKU</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $pet->name }}">
                        @error('name')
                            <span class="help-block
                                text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div
                        class="form-group
                        @error('breed')
                            has-error
                        @enderror">
                        <label for="breed">Raza</label>
                        <input type="text" class="form-control" id="breed" name="breed"
                            value="{{ $pet->breed }}">
                        @error('breed')
                            <span class="help-block text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div
                        class="form-group
                        @error('gender')
                            has-error
                        @enderror">
                        <label for="gender">Genero</label>
                        <input type="text" class="form-control" id="gender" name="gender"
                            value="{{ $pet->gender }}">
                        @error('gender')
                            <span class="help-block text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div
                        class="form-group
                        @error('age')
                            has-error
                        @enderror">
                        <label for="age">Edad</label>
                        <input type="text" class="form-control" id="age" name="age"
                            value="{{ $pet->age }}">
                        @error('age')
                            <span class="help-block text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div
                        class="form-group
                        @error('sprice')
                            has-error
                        @enderror">
                        <label for="price">Precio</label>
                        <input type="text" class="form-control" id="price" name="price"
                            value="{{ $pet->price }}">
                        @error('price')
                            <span class="help-block text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group @error('pet_type') has-error @enderror">
                        <label for="pet_type">Selecciona el tipo de mascota:</label>
                        <select class="form-control" id="pet_type" name="pet_type">
                            @foreach ($petTypes as $pettype)
                                <option value="{{ $pettype->id }}"  @if ($pet->pet_type_id == $pettype->id) selected @endif>{{ $pettype->name }}</option>
                                
                            @endforeach
                        </select>
                        <a href="{{ route('pet_type.create') }} ">Agregar nuevo</a>
                    </div>
                    <div class="form-group files color">
                        <label for="img_url">Imagen</label>
                        <input type="file" name="img_url" id="img_url" class="form-control"
                            value="{{ old('img_url') }}" accept="image/*">
                    </div>

                    <button type="submit" class="btn btn-success rounded-pill pl-4 pr-4 fw-bold">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
