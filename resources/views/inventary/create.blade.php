@extends('layouts.app')

@section('content')
{{-- agregar datos del producto seleccionado --}}
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Entrada de productos</h1>
            <a href="{{ route('inventary.index') }}" class="btn btn-primary">Regresar</a>
            <form action="{{ route('inventary.store') }}" method="POST">
                @csrf
                <div class="form-group @error('product_id') has-error @enderror">
                    <label for="product_id">Producto</label>
                    <select name="product_id" id="product_id" class="form-control">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    @error('product_id')
                        <span class="help-block text-danger">{{ $message }}</span>  
                    @enderror
                </div>
                <div class="form-group @error('price') has-error @enderror">
                    <label for="price">Precio</label>
                    <input type="number" name="price" id="price" class="form-control" value="0">
                    @error('price')
                        <span class="help-block text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group @error('quantity') has-error @enderror">
                    <label for="quantity">Cantidad</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" value="0">
                    @error('quantity')
                        <span class="help-block text-danger">{{ $message }}</span> 
                    @enderror
                </div>
                <div class="form-group @error('description') has-error @enderror">
                    <label for="description">Descripción</label>
                    {{-- <input type="text" name="description" id="description" class="form-control"> --}}
                    <select name="description" id="description" class="form-control">
                        <option value="Entrada">Entrada</option>
                        <option value="Salida">Salida</option>
                    </select>
                    @error('description')
                        <span class="help-block text-danger">{{ $message }}</span> 
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>


@endsection