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
                <h1>Proveedor</h1>
            </div>


            <div class="col-md-6 text-end">
                <a href="{{ route('home') }}" class="btn btn-outline-primary">Regresar</a>
            </div>
            <a class="mt-5  text-center btn btn-outline-success" href="{{ route('providers.create') }}">Nuevo Proveedor</a>

                
        </div>
        <div class="row mt-2">
            <div class="col-12">
                <table class="table table-bordered rounded-3 overflow-hidden">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Encargado</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($providers as $provider)
                            <tr>
                                <td>{{ $provider->id }}</td>
                                <td>{{ $provider->name }}</td>
                                <td>{{ $provider->email }}</td>
                                <td>{{ $provider->phone }}</td>
                                <td>{{ $provider->attendant }}</td>
                                <td>
                                    @if ($provider->img_url != null)
                                        <img src="{{ asset('images/provider/' . $provider->img_url) }}"
                                            alt="{{ $provider->img_url }}" width="50px">
                                    @else
                                        <img src="{{ asset('images/sinfoto.png') }}" alt="{{ $provider->img_url }}"
                                            width="50px">
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('providers.edit', $provider->id) }}"
                                            class="btn btn-warning">Editar</a>
                                        <form action="{{ route('providers.destroy', $provider->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('¿Estás seguro de que deseas eliminar este proveedor?')">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
