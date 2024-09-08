@extends('layouts.app')

@section('content')
<style>
    .blog:hover {
            background-color: #343a40;
            
            border-radius: 20px;
        }
</style>

    <div class="container">
        <x-title-admin title="Mi carrito" route="gues"/>
        @if (@session('cart'))
            <div class="row mb-4">
            @foreach (@session('cart') as $id => $product)
                <div class="col-12 col row  border-top blog">
                <div class=" col-md-10 ">
                <a href="#" class="btn p-0" style="width:100%;">
                    <div class="card border-0">
                            <div class="card-body ">
                            <div class="row">
                                <div class="col-sm">
                                    <!-- IMAGEN AQUI -->
                                </div>
                                <div class="col-sm-10">
                                    <h5 class="card-title text-left">{{ $product['name'] }}</h5>
                                    <div class="row">
                                    <b class="card-text text-left col-md-auto">Precio:</b> {{ $product['price'] }}
                                    </div>
                                    <div class="row">
                                    <b class="card-text text-left col-md-auto">Cantidad:</b> {{ $product['quantity'] }}
                                    </div>
                                    <div class="row">
                                    <b class="card-text text-left col-md-auto">Descripción:</b> {{ $product['description'] }}
                                    </div>
                                    <div class="row">
                                    <b class="card-text text-left col-md-auto">Fecha:</b> {{ $product['date'] }}
                                    </div>
                                    
                                </div>
                                
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm my-auto">
                    <div class="d-flex justify-content-evenly ">
                    <form method="POST" class="fm-inline " action="{{ route('inventary.destroy', $id)}}">
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="btn btn-danger rounded-circle py-2" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')">
                            <i class="fa-solid fa-xmark fa-xl  "></i>
                        </button>
                    </form>
                    </div>
                    
                </div>  
                  
                </div>
            @endforeach
            </div>
        @endif

        
        
        <!-- <div class="row">
            <div class="col-12">
                
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
                            // dd(@session('cart'))

                        @endphp
                        @if (@session('cart'))

                            @foreach (@session('cart') as $id => $product)
                                <tr>
                                    <td>{{ $product['name'] }}</td>
                                    <td class="text-right">${{ number_format($product['price'], 2) }}</td>
                                    <td class="text-right">{{ $product['quantity'] }}</td>
                                    <td>{{ $product['description'] }}</td>
                                    @php $total += $product['quantity'] ; @endphp
                                    <td>{{ $product['date'] }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <form action="{{ route('inventary.destroy', $id) }}" method="POST"
                                                style="display: inline;">
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
                        @endif


                    </tbody>
                </table>
            </div>
        </div> -->
        
        <a href="#" class="btn btn-success " data-toggle="modal" data-target="#modalBill"><i class="fa-solid fa-basket-shopping fa-lg mr-2"></i>Finalizar Compras</a>

        <div class="modal fade text-left" id="modalBill" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <form action="{{ route('home.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
                            <div class="row">
                                <h2>Datos de Factura</h2>

                                <hr>

                                <div class="row">

                                    <div class="col-md-6">
                                        <label for="payment_type">Tipo de Pago</label>
                                        <select class="form-control" id="payment_type" name="payment_type">
                                            <option value="">Seleccionar Tipo de pago</option>
                                            @foreach ($payment_types as $payment_type)
                                                <option value="{{ $payment_type->id }}">{{ $payment_type->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>

                                </div>

                                <h2>Datos de Envio</h2>

                                <hr>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="address">Dirección</label>
                                            <input type="text" name="address" id="address" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="zipcode">Codigo Postal</label>
                                            <input type="text" name="zipcode" id="zipcode" class="form-control">
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <label for="cities">Ciudad</label>
                                        <select class="form-control" id="cities" name="cities">
                                            <option value="">Seleccionar la Ciudad</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city }}">{{ $city }}</option>
                                            @endforeach

                                        </select>
                                    </div>



                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="subtotal" value="{{ $subtotal }}">
                                        <h4>Subtotal: {{ $subtotal }}</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="hidden" name="total" value="{{ $totalPaid }}">
                                        <h4>Total: {{ $totalPaid }}</h4>
                                    </div>
                                </div>
                            </div>


                            <button class="btn btn-success" type="submit"> Realizar Factura</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
