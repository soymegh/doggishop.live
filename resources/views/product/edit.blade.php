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
            <div class="col-md-12 border rounded-5 my-5">
                <div class="row mt-4 mb-3  ml-1 mr-3">
                    <div class="col">
                        <h2>Editar Producto</h2>
                    </div>   
                    <div class="col text-right">
                        <a href="{{ route('products.index') }}" class="btn btn-primary rounded-pill">Regresar</a>
                    </div>  
                </div>
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
                    <div class="form-group files color">
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