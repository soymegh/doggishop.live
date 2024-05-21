@extends('layouts.app')

@section('content')
<style>
        thead  tr  th {
            background-color: #f3ad55 !important; 
            color: white !important;

        }

        tbody tr td {
            background-color: #f8ead6 !important;

        }
        
</style>
    <div class="container">
        
    <div class="row my-4">
        <div class="col-md-6">
            <h2>Productos</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('home') }}" class="btn btn-outline-primary">Regresar</a>
        </div>

        <a href="{{ route('products.create') }}" class="mt-5 text-center btn btn-outline-success">Nuevo</a>
    </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Descripcion') }}</th>
                            <th>{{ __('Tamaño') }}</th>
                            <th>{{ __('Precio') }}</th>
                            <th>{{ __('Foto') }}</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->size }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    @if ($product->picture != null)
                                        <img src="{{ asset('images/product/' . $product->picture) }}"
                                            alt="{{ $product->picture }}" width="50px">
                                    @else
                                        <img src="{{ asset('images/sinfoto.png') }}" alt="{{ $product->picture }}"
                                            width="50px">
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('inventary.show', $product->id) }}"
                                            class="btn btn-outline-info">Ver</a>
                                        <a href="{{ route('products.edit', $product->id) }}"
                                            class="btn btn-outline-primary">Editar</a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger"
                                                onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
