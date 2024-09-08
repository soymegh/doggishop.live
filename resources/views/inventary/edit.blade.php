@extends('layouts.app') 

@section('content')

<div class="container">
    <div class="row">
        <div class=" col-md-12 border rounded-5 mt-5 ">

            <div class="row mt-3 mb-3  ml-1 mr-3">
                <div class="col">
                    <h2>Entrada de Productos</h2>
                </div>
                <div class="col text-right  ">
                    <a href="{{ route('products.index') }}" class="btn btn-outline-primary rounded-circle"
                        title="Regresar a Tipos de pago">
                        <i class=" py-3 fa-solid fa-box fa-xl"></i>
                    </a>
                </div>
            </div>

            <form class=" mt-3 mb-3  ml-1 mr-3" action="{{ route('inventary.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group @error('product_id') has-error @enderror">
                    <label for="product">Producto</label>

                    <input type="text" name="product_id" id="product_id" class="form-control" value="{{$item->id}}" readonly hidden>
                    
                    <select name="product" id="product" class="form-select" disabled>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" @if ($item->id == $product->id) selected @endif >{{ $product->name }}</option>
                        @endforeach
                    </select>
                    @error('product_id')
                        <span class="help-block text-danger">{{ $message }}</span>  
                    @enderror
                </div>

                <div class="form-group @error('description') has-error @enderror">
                    <label for="description">Tipo de movimiento</label>
                    <input type="text" name="description" id="description" class="form-control" value="Entrada" readonly>

                    
                    @error('description')
                        <span class="help-block text-danger">{{ $message }}</span> 
                    @enderror
                </div>

                <div class="form-group @error('price') has-error @enderror">
                    <label for="price">Costo adquisición</label>
                    <input step="0.01" type="number" name="price" id="price" class="form-control" value="0">
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
                
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>


</div>

@endsection