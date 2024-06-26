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
                <h2>Categorías</h2>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('home') }}" class="btn btn-outline-primary">Regresar</a>
            </div>

            <a href="{{ route('categories.create') }}" class="mt-5 text-center btn btn-outline-success">Nueva Categoría</a>
        </div>
              
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered rounded-3 overflow-hidden">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Foto</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                        @if($category->img_url != null)
                                        <img src="{{ asset('images/category/' . $category->img_url) }}"
                                            alt="{{ $category->name }}" width="50">
                                        @else
                                        <img src="{{ asset('images/sinfoto.png') }}" alt="{{ $category->name }}"
                                            width="50">
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <div class="btn-group" role="group">
                                            <!-- se siente innecesario-->
<!--                                            <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info">Ver</a>-->
                                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary ml-5 mr-3 pr-3 pl-3 rounded-pill">Editar</a>
                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger action mr-5 rounded-pill" onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?')">Eliminar</button>
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
