@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row my-2">
            <h2>Categorías</h2>
            <a href="{{ route('home') }}" class="link-primary">Regresar</a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('categories.create') }}" class="btn btn-outline-success">Nueva Categoría</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
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
                                    
                                    <img src="{{ asset('images/category/' . $category->img_url) }}" alt="{{ $category->name }}" width="50">
                                <td>
                                    <a href="{{ route('categories.show', $category->id) }}"
                                        class="btn btn-outline-info">Ver</a>
                                    <a href="{{ route('categories.edit', $category->id) }}"
                                        class="btn btn-outline-primary">Editar</a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger"
                                            onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
