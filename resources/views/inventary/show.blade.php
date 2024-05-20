@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div>
                <h1>Inventary</h1>
                <a href="{{ route('products.index') }}">Regresar</a>
                </div>
                <a href="{{ route('inventary.create') }}" class="btn btn-primary">Agregar Movimiento</a>
                <table class="table ">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Descripción</th>
                            <th>Cliente</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($products as $product)
                            <tr>

                                <td>{{ $product->getProduct() }}</td>
                                <td class="text-right">{{ $product->price }}</td>
                                <td class="text-right">{{ $product->quantity }}</td>
                                <td>{{ $product->description }}</td>
                                {{-- sumar o restar la cantidad de productos --}}
                                @if ($product->description == 'Entrada')
                                    @php $total += $product->quantity; @endphp
                                @else
                                    @php $total -= $product->quantity; @endphp
                                @endif

                                <td>{{ $product->getUser() }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <form action="{{ route('inventary.destroy', $product->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        {{-- fila para los totales --}}
                        <tr>
                            <td colspan="2">Total</td>
                            <td class="text-right">
                                {{ $total }}
                            </td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
