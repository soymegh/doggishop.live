@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Pet Types</h1>
        <a href="{{ route('home') }}">Regresar</a>
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
                @foreach($petTypes as $pettype)
                    <tr>
                        <td>{{ $pettype->name }}</td>
                        <td><img src=" {{ asset('images/pet_type/' . $pettype->img_url) }}" alt="{{$pettype->img_url}}" width="50px"> </td>
                        <td>
                            <a href="{{ route('pet_type.show', $pettype->id) }}" class="btn btn-primary">View</a>
                            <a href="{{ route('pet_type.edit', $pettype->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('pet_type.destroy', $pettype->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta mascota?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection