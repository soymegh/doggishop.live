@extends('layouts.app')

@section('content')
    <style>
        thead tr th {
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
                <h2>Mascotas</h2>    
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('home') }}" class="btn btn-outline-primary">Regresar</a>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-12 text-end">
                <a href="{{ route('pets.create') }}" class="btn btn-success">Nueva mascota</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered rounded-3 overflow-hidden">
                    <thead>
                        <tr>
                            <th>{{ __('SKU') }}</th>
                            <th>{{ __('Raza') }}</th>
                            <th>{{ __('Genero') }}</th>
                            <th>{{ __('Edad') }}</th>
                            <th>{{ __('Precio') }}</th>
                            <th>{{ __('Foto') }}</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pets as $pet)
                            <tr>
                                <td>{{ $pet->name }}</td>
                                <td>{{ $pet->breed }}</td>
                                <td>{{ $pet->gender }}</td>
                                <td>{{ $pet->age }}</td>
                                <td>{{ $pet->price }}</td>
                                <td>
                                    @if ($pet->img_url != null)
                                        <img src="{{ asset('images/pet/' . $pet->img_url) }}" alt="{{ $pet->name }}" width="50">
                                    @else
                                        <img src="{{ asset('images/sinfoto.png') }}" alt="{{ $pet->name }}" width="50">
                                    @endif
                                </td>
                                <td class="text-right">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('pets.show', $pet->id) }}" class="btn btn-info rounded-pill px-3">Ver</a>
                                        <a href="{{ route('pets.edit', $pet->id) }}" class="btn btn-primary rounded-pill mx-2">Editar</a>
                                        <form action="{{ route('pets.destroy', $pet->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger rounded-pill" onclick="return confirm('¿Estás seguro de que deseas eliminar esta mascota?')">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
