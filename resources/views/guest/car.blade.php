@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div>
                    <h1>Mis Compras</h1>
                    <a href="{{ route('home') }}">Regresar</a>
                </div>
                <table class="table ">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Descripción</th>
                            <th>Fecha</th>
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
                                @php $total += $product->quantity; @endphp

                                <td>{{ $product->create_at }}</td>
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
