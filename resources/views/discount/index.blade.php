@extends('layouts.app')

@section('content')
    {{-- listado de Descuentos --}}

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Descuentos
                        <p>
                            <a href="{{ route('discounts.create') }}" class="btn btn-success">Crear Descuento</a>
                        </p>
                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Descuento</th>
                                        <th scope="col">Mascotas</th>
                                        <th scope="col">Productos</th>
                                        <th scope="col">Inicio</th>
                                        <th scope="col">Fin</th>
                                        <th scope="col">Activa</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($discounts as $discount)
                                        <tr>
                                            <th scope="row">{{ $discount->id }}</th>
                                            <td>{{ $discount->name }}</td>
                                            <td>{{ $discount->description }}</td>
                                            <td>{{ $discount->discount }}</td>
                                            <td>
                                                {{ $discount->pets ? 'Si' : 'No' }}
                                            </td>
                                            <td>
                                                {{ $discount->products ? 'Si' : 'No' }}
                                            </td>
                                            <td>{{ $discount->start_time }}</td>
                                            <td>{{ $discount->end_time }}</td>
                                            <td>{{ $discount->status ? 'Si' : 'No' }}</td>
                                            <td class="d-flex">
                                                <a href="{{ route('discounts.edit', $discount->id) }}"
                                                    class="btn btn-primary">Editar</a>
                                                <form action="{{ route('discounts.destroy', $discount->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('¿Estás seguro de que deseas eliminar este descuento?')">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
