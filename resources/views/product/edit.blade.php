@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2 class="col-12">Editar Producto</h2>
            <a href="{{ route('products.index') }}" class="link-primary col-12">Regresar</a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div
                        class="form-group
                        @error('name')
                            has-error
                        @enderror">
                        <label for="name">{{ __('Nombre') }}</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $product->name }}">
                        @error('name')
                            <span class="help-block text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div
                        class="form-group
                        @error('description')
                            has-error
                        @enderror">
                        <label for="description">{{ __('Description') }}</label>
                        <input type="text" class="form-control" id="description" name="description"
                            value="{{ $product->description }}">
                        @error('description')
                            <span class="help-block text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group
                        @error('size')
                            has-error
                        @enderror">
                        <label for="size">{{ __('Tamaño') }}</label>
                        <input type="text" class="form-control" id="size" name="size"
                            value="{{ $product->size }}">
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
                            value="{{ $product->price }}">
                        @error('price')
                            <span class="help-block text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('stock') has-error @enderror">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock"
                            value="{{ $product->stock }}">
                        @error('stock')
                            <span class="help-block text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group @error('pet-type') has-error @enderror">
                        <label for="pet_type_id">Selecciona el tipo de mascota:</label>
                        <select class="form-control" id="pet_type_id" name="pet_type_id">
                            @foreach ($pet_types as $pet_type)
                                <option value="{{ $pet_type->id }}" @if($product->pet_type_id == $pet_type->id) selected @endif>  {{ $pet_type->name }}</option>
                            @endforeach
                        </select>
                        <a href="{{ route('pet_type.create') }} ">Agregar nuevo</a>
                    </div> 
                    
                    <div class="form-group @error('category_id') has-error @enderror">
                        <label for="category_id">Selecciona la categoria:</label>
                        <select class="form-control" id="category_id" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"  @if ($product->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                
                            @endforeach
                        </select>
                        <a href="{{ route('categories.create') }} ">Agregar nuevo</a>
                    </div>

                    <div class="form-group @error('provider_id') has-error @enderror">
                        <label for="provider_id">Selecciona el proveedor:</label>
                        <select class="form-control" id="provider_id" name="provider_id">
                            @foreach ($providers as $provider)
                                <option value="{{ $provider->id }}"  @if ($product->provider_id == $provider->id) selected @endif>{{ $provider->name }}</option>
                                
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