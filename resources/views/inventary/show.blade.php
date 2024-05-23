@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1>Inventario</h1>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Regresar</a>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-12">
                <a href="{{ route('inventary.create') }}" class="btn btn-primary">Agregar Movimiento</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>Producto</th>
                            <th class="text-right">Precio</th>
                            <th class="text-right">Cantidad</th>
                            <th>Descripción</th>
                            <th>Cliente</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->getProduct() }}</td>
                                <td class="text-right">${{ number_format($product->price, 2) }}</td>
                                <td class="text-right">{{ $product->quantity }}</td>
                                <td>{{ $product->description }}</td>
                                @if ($product->description == 'Entrada')
                                    @php $total += $product->quantity; @endphp
                                @else
                                    @php $total -= $product->quantity; @endphp
                                @endif
                                <td>{{ $product->getUser() }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <form action="{{ route('inventary.destroy', $product->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        {{-- Fila para los totales --}}
                        <tr>
                            <td colspan="2"><strong>Total</strong></td>
                            <td class="text-right"><strong>{{ $total }}</strong></td>
                            <td colspan="3"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
