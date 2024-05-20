@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <h1 class="col-12">Pet Types</h1>
            <a href="{{ route('home') }}" class="col-12">Regresar</a>
        </div>
        <a href="{{ route('pet_type.create') }}" class="btn btn-primary">Add Pet Type</a>
        <table class="table table-striped">
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
