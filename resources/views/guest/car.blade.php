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
                                        <form action="{{ route('inventary.destroy', $product->id) }}" method="POST"
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
                    </tbody>
                </table>
            </div>
        </div>
        <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalBill">Finalizar Compras</a>

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
