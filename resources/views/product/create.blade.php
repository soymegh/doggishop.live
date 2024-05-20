@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2 class="col-12">Crear Producto</h2>
            <a href="{{ route('products.index') }}" class="link-primary col-12">Regresar</a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div
                        class="form-group
                        @error('name')
                            has-error
                        @enderror">
                        <label for="name">{{ __('Nombre') }}</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name') }}">
                        @error('name')
                            <span class="help-block
                                text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div
                        class="form-group
                        @error('descripcion')
                            has-error
                        @enderror">
                        <label for="description">{{ __('Descripción') }}</label>
                        <input type="text" class="form-control" id="description" name="description"
                            value="{{ old('description') }}">
                        @error('description')
                            <span class="help-block text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div
                        class="form-group
                        @error('size')
                            has-error
                        @enderror">
                        <label for="size">{{ __('Peso') }}</label>
                        <input type="text" class="form-control" id="size" name="size"
                            value="{{ old('size') }}">
                        @error('size')
                            <span class="help-block text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div
                        class="form-group
                        @error('price')
                            has-error
                        @enderror">
                        <label for="price">{{ __('Precio') }}</label>
                        <input type="number" class="form-control" id="price" name="price"
                            value="{{ old('price') }}">
                        @error('price')
                            <span class="help-block text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group
                        @error('stock')
                            has-error
                        @enderror">
                        <label for="stock">{{ __('Stock') }}</label>
                        <input type="number" class="form-control" id="stock" name="stock"
                            value="{{ old('stock') }}">
                        @error('stock')
                            <span class="help-block text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group @error('pet-type') has-error @enderror">
                        <label for="pet_type_id">Selecciona el tipo de mascota:</label>
                        <select class="form-control" id="pet_type_id" name="pet_type_id">
                            @foreach ($pet_types as $pet_type)
                                <option value="{{ $pet_type->id }}">{{ $pet_type->name }}</option>
                            @endforeach
                        </select>
                        <a href="{{ route('pet_type.create') }} ">Agregar nuevo</a>
                    </div>


                    <div class="form-group @error('category') has-error @enderror">
                        <label for="category_id">Selecciona la Categoría:</label>
                        <select class="form-control" id="category_id" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <a href="{{ route('categories.create') }} ">Agregar nuevo</a>
                    </div>
                    <div class="form-group @error('provider') has-error @enderror">
                        <label for="provider_id">Selecciona el proveedor:</label>
                        <select class="form-control" id="provider_id" name="provider_id">
                            @foreach ($providers as $provider)
                                <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                            @endforeach
                        </select>
                        <a href="{{ route('providers.create') }} ">Agregar nuevo</a>
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
