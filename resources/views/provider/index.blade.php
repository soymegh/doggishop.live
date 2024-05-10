@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Providers</h1>
            <a class="text-right" href="{{ route('providers.create') }}">Nuevo Proveedor</a> 
            <a href="{{route('home')}}">Regresar</a>
        </div>
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
                @foreach($providers as $provider)
                <tr>
                    <td>{{ $provider->id }}</td>
                    <td>{{ $provider->name }}</td>
                    <td>{{ $provider->email }}</td>
                    <td>{{ $provider->phone }}</td>
                    <td>{{ $provider->attendant }}</td>
                    <td><img src="{{ asset('images/provider/' .$provider->img_url) }}" alt="{{$provider->img_url}}" width="50px" ></td>
                    <td>
                        <a href="{{ route('providers.edit', $provider->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('providers.destroy', $provider->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este proveedor?')" >Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>    
    </div>    
    </div>   
    
@endsection