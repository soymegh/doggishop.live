@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Productos</h2>
            <a href="{{ route('home') }}" class="link-primary">Regresar</a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('products.create') }}" class="btn btn-outline-success">Nuevo</a>
            </div>
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
                                <td> <img src="{{ asset('images/product/' . $product->picture) }}" alt="{{$product->picture}}"
                                        width="50px"> </td>
                                <td>
                                    <a href="{{ route('products.show', $product->id) }}"
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
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
