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
                <h2>Tipos de mascota</ºh2>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('home') }}" class="btn btn-outline-primary">Regresar</a>
            </div>

            <a href="{{ route('pet_type.create') }}" class="mt-5 text-center btn btn-outline-success">Nuevo Tipo</a>
        </div>

        <table class="table table-bordered rounded-3 overflow-hidden">
            <thead>
                <tr>
                    <th>Tipo de Mascota</th>
                    <th>Foto</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($petTypes as $pettype)
                    <tr>
                        <td>{{ $pettype->name }}</td>
                        <td>
                            @if ($pettype->img_url != null)
                                <img src=" {{ asset('images/pet_type/' . $pettype->img_url) }}" alt="{{ $pettype->img_url }}"
                                    width="50px">
                            @else
                                <img src="{{ asset('images/sinfoto.png') }}" alt="{{ $pettype->img_url }}" width="50px">
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('pet_type.show', $pettype->id) }}" class="btn btn-outline-info">View</a>
                                <a href="{{ route('pet_type.edit', $pettype->id) }}"
                                    class="btn btn-outline-primary">Edit</a>
                                <form action="{{ route('pet_type.destroy', $pettype->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger"
                                        onclick="return confirm('¿Estás seguro de que deseas eliminar esta mascota?')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
