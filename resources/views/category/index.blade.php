@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row my-4">
            <div class="col-md-6">
                <h2>Categorías</h2>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('home') }}" class="btn btn-outline-primary">Regresar</a>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-12 text-end">
                <a href="{{ route('categories.create') }}" class="btn btn-success">Nueva Categoría</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Foto</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        @if($category->img_url != null)
                                        <img src="{{ asset('images/category/' . $category->img_url) }}"
                                            alt="{{ $category->name }}" width="50">
                                        @else
                                        <img src="{{ asset('images/sinfoto.png') }}" alt="{{ $category->name }}"
                                            width="50">
                                        @endif
                                    </td>
                                    <td>
    <div class="btn-group" role="group">
        <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info">Ver</a>
        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Editar</a>
        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?')">Eliminar</button>
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
    </div>
@endsection
