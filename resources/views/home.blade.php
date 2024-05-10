@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">

             <!-- Categorias -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2 bg-success">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                    Categorias</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Registros: {{$categoryCount}} </div>
                                <div class="p mb-0 text-gray-800"><a href="{{route('categories.index')}}" class="text-white">Ver Registros</a></div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>      

            <!-- Mascotas -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2 bg-info">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Mascotas
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Registros: {{$petCount}}</div>
                                        <div class="p mb-0 text-gray-800"><a href="{{route('pets.index')}}" class="text-white">Ver Registros</a></div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <!-- Productos -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2 bg-primary">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                    Productos</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Registros: {{$productCount}} </div>
                                <div class="p mb-0 text-gray-800"><a href="{{route('products.index')}}" class="text-white">Ver Registros</a></div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tipos de Mascotas -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2 bg-warning">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                    Tipos de Mascotas</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Registros: {{$petTypeCount}} </div>
                                <div class="p mb-0 text-gray-800"><a href="{{route('pet_type.index')}}" class="text-white">Ver Registros</a></div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Proveedores -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2 bg-danger">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                    Proveedores</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Registros: {{$providerCount}} </div>
                                <div class="p mb-0 text-gray-800"><a href="{{route('providers.index')}}" class="text-white">Ver Registros</a></div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <!-- Blog -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2 bg-secondary">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                    Blog</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Registros: {{$blogCount}} </div>
                                <div class="p mb-0 text-gray-800"><a href="{{route('blogs.index')}}" class="text-white">Ver Registros</a></div>
                            </div>
                            
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
