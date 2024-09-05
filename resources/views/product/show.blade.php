@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Ver Producto</h2>
            <a href="{{ route('products.index') }}" class="btn btn-primary rounded-circle" title="Regresar a Productos">
                    <i class=" py-3 fa-solid fa-rotate-left fa-xl"></i>
                    </a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group
                    @error('name')
                        has-error
                    @enderror">
                    <label for="name">{{ __('Producto') }}</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ $product->name }}" disabled>
                    @error('name')
                        <span class="help-block text-danger">{{ $message }}</span>  
                    @enderror
                </div>
                <div class="form-group
                    @error('description')
                        has-error
                    @enderror">
                    <label for="description">{{ __('Descripción') }}</label>
                    <input type="text" class="form-control" id="description" name="description"
                        value="{{ $product->description }}" disabled>
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
                        value="{{ $product->size }}" disabled>
                    @error('size')
                        <span class="help-block text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group
                    @error('price')
                        has-error
                    @enderror">
                    <label for="price">{{ __('Price') }}</label>
                    <input type="text" class="form-control" id="price" name="price"
                        value="{{ $product->price }}" disabled>
                    @error('price')
                        <span class="help-block
                            text-danger">{{ $message }}</span>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="image">{{ __('Imagen') }}</label> <br>
                    <img src="{{ asset('images/product/' . $product->picture) }}" class="img-fluid  rounded"  alt="producto" >
                </div>
            </div>
        </div>
    </div>
@endsection