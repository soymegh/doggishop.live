@extends('layouts.app')

@section('content')
    {{-- view Product --}}
    <div class="container text-center my-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-4">Producto</h1>
                <div class="card shadow-sm">
                    <div class="card-body">
                        @if ($product->picture != null)
                            <img src="{{ asset('images/product/' . $product->picture) }}" class="img-thumbnail mb-3"
                                alt="producto" style="width: 150px; height: 150px; object-fit: cover;">
                        @else
                            <img src="{{ asset('images/sinfoto.png') }}" class="img-thumbnail mb-3" alt="sinfoto"
                                style="width: 150px; height: 150px; object-fit: cover;">
                        @endif
                        <h4 class="card-title text-dark fw-bold">{{ $product->name }}</h4>
                        <p class="card-text text-info">{{ $product->description }}</p>
                        <p class="card-text text-success">Precio: U$ {{ $product->price }}</p>
                        <form action="{{ route('inventary.store') }}" method="POST" class="d-inline-block">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="price" value="{{ $product->price }}">
                            <input type="hidden" name="description" value="Salida">
                            <div class="d-flex justify-content-center align-items-center mb-2">
                                <input type="number" name="quantity" value="1"
                                    class="form-control form-control-sm text-center me-2" style="width: 60px;">
                                <button type="submit" class="btn btn-outline-success btn-sm">Comprar</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('home') }}" class="btn btn-outline-info btn-sm">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
