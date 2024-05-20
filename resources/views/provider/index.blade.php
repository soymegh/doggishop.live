@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="col-12">Providers</h1>
                <a href="{{ route('home') }}" class="col-12">Regresar</a>
            </div>
            <a class="text-right btn btn-outline-success" href="{{ route('providers.create') }}">Nuevo Proveedor</a>
                
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>Encargado</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
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
