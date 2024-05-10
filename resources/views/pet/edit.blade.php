@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Editar Mascota</h2>
            <a href="{{ route('pets.index') }}" class="link-primary">Regresar</a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('pets.update', $pet->id) }}" method="POST" enctype="multipart/form-data">
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
