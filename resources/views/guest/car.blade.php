@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Mis Compras</h1>
                    <a href="{{ route('home') }}" class="btn btn-primary">Regresar</a>
                </div>
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Descripción</th>
                            <th>Fecha</th>
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
                                @php $total += $product->quantity; @endphp
                                <td>{{ $product->create_at }}</td>
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
