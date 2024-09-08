@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row my-4">
        <div class="col-md-6">
            <h2>Inventario de productos</h2>
        </div>
        <div class="col-md-6 text-end">
            
            <a href="{{ route('products.index') }}" title="Regresar a productos" class="btn btn-outline-primary rounded-circle"><i class=" py-3 fa-solid fa-box fa-xl"></i></a>
            <a href="{{ route( 'inventary.edit',$id ) }}" title="Agregar un movimiento" class="text-center btn btn-outline-success rounded-circle"><i class="py-3 fa-solid fa-plus fa-xl"></i></a>
            
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
                                    @if ($product->description == 'Entrada')
                                    <div class="btn-group" role="group">
                                        <form action="{{ route('inventary.destroy', $product->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-circle">
                                            <i class="fa-solid fa-xmark fa-xl  "></i>
                                            </button>
                                        </form>
                                    </div>
                                    @endif
                                    
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
