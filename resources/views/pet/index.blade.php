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
        <div class="row">
            <h2 class="col-12">Mascotas</h2>
            <a href="{{ route('home') }}" class="link-primary col-12">Regresar</a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('pets.create') }}" class="btn btn-outline-success">Nuevo</a>
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
                                        <img src="{{ asset('images/pet/' . $pet->img_url) }}" alt="{{ $pet->name }}"
                                            width="50">
                                    @else
                                        <img src="{{ asset('images/sinfoto.png') }}" alt="{{ $pet->name }}"
                                            width="50">
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('pets.show', $pet->id) }}" class="btn btn-outline-info">Ver</a>
                                        <a href="{{ route('pets.edit', $pet->id) }}"
                                            class="btn btn-outline-primary">Editar</a>
                                        <form action="{{ route('pets.destroy', $pet->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger"
                                                onclick="return confirm('¿Estás seguro de que deseas eliminar esta mascota?')">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
