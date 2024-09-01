@extends('layouts.app')

@section('content')
<style>
    .card {
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card-yellow {
        background-color: #FFE5B4;
        color: #333;
    }

    .card-blue {
        background-color: #AED9E0;
        color: #333;
    }

    .card-title {
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
    }

    .card-text {
        font-size: 1.2rem;
        margin-bottom: 1rem;
    }

    .btn {
        border-radius: 99999pc;
        color: #333;
        border-color: #333;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn:hover {
        background-color: #02365a;
        color: #fff !important; 
        border-color: #02365a;
        font-weight: bold;
    }
</style>
<div class="container-fluid">
    <div class="row mt-4 mx-4">

        <!-- Categorías -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card card-yellow">
                <div class="card-body">
                    <h5 class="card-title text-center">Categorías</h5>
                    <p class="card-text">Registros: {{$categoryCount}}</p>
                    <a href="{{route('categories.index')}}" class="btn btn-sm btn-light d-block mx-auto">Ver</a>
                </div>
            </div>
        </div>

        <!-- Mascotas -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card card-blue">
                <div class="card-body">
                    <h5 class="card-title text-center">Mascotas</h5>
                    <p class="card-text">Registros: {{$petCount}}</p>
                    <a href="{{route('pets.index')}}" class="btn btn-sm btn-light d-block mx-auto">Ver</a>
                </div>
            </div>
        </div>

        <!-- Productos -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card card-yellow">
                <div class="card-body">
                    <h5 class="card-title text-center">Productos</h5>
                    <p class="card-text">Registros: {{$productCount}}</p>
                    <a href="{{route('products.index')}}" class="btn btn-sm btn-light d-block mx-auto">Ver</a>
                </div>
            </div>
        </div>

        <!-- Tipos de Mascotas -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card card-blue">
                <div class="card-body">
                    <h5 class="card-title text-center">Tipos de Mascotas</h5>
                    <p class="card-text">Registros: {{$petTypeCount}}</p>
                    <a href="{{route('pet_type.index')}}" class="btn btn-sm btn-light d-block mx-auto">Ver</a>
                </div>
            </div>
        </div>

        <!-- Proveedores -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card card-yellow">
                <div class="card-body">
                    <h5 class="card-title text-center">Proveedores</h5>
                    <p class="card-text">Registros: {{$providerCount}}</p>
                    <a href="{{route('providers.index')}}" class="btn btn-sm btn-light d-block mx-auto">Ver</a>
                </div>
            </div>
        </div>

        <!-- Blog -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card card-blue">
                <div class="card-body">
                    <h5 class="card-title text-center">Blog</h5>
                    <p class="card-text">Registros: {{$blogCount}}</p>
                    <a href="{{route('blogs.index')}}" class="btn btn-sm btn-light d-block mx-auto">Ver</a>
                </div>
            </div>
        </div>

        <!-- Usuarios -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card card-yellow">
                <div class="card-body">
                    <h5 class="card-title text-center">Usuarios</h5>
                    <p class="card-text">Registros: {{$userCount}}</p>
                    <a href="{{route('admin.index')}}" class="btn btn-sm btn-light d-block mx-auto">Ver</a>
                </div>
            </div>
        </div>

        <!-- Inventario 
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card card-blue">
                <div class="card-body">
                    <h5 class="card-title text-center">Historial de Productos</h5>
                    <p class="card-text">Registros: {{$historyCount}}</p>
                    <a href="{{route('inventary.index')}}" class="btn btn-sm btn-light d-block mx-auto">Ver</a>
                </div>
            </div>
        </div>
        -->

        
    </div>
</div>

<div class="mt-5 pt-5 pb-3">
    
</div>

@endsection
