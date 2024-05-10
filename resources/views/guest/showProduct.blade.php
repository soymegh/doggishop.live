@extends('layouts.app')

@section('content')
    {{-- view Product --}}
    <div class="container text-center">
        <div class="row text-center">
            <div class="col-md-12">
                <h1>Producto</h1>
                <div class="row ">
                    <div class="col-md-3">
                        <div class="card">
                            <img src="{{ asset('images/product/' . $product->picture) }}" class="card-img-top rounded" alt="producto" >
                            <div class="card-body text-center">
                                <h4 class="card-title text-ingo">{{ $product->name }}</h5>
                                <p class="card-text text-info">{{ $product->description }}</p>
                                <p class="card-text text-success">Precio: U$ {{ $product->price }}</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('home') }}" class="btn btn-outline-info">Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
