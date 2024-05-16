@extends('layouts.app')

@section('content')
<style>
    .card-yellow{
        background-color: #F7DBA7;
        border: none;
        
    }

    .card-blue{
        background-color: #003854;
        border: none;
        color: white;
        
    }
</style>
<div class="container-fluid">

    <div class="row mt-4 ml-4 mr-4">

        <!-- Categorías -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card card-yellow border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5  font-weight-bold text-uppercase mb-1 text-center">
                                Categorías </div>
                                <hr></hr>
                                <div class="row g-0">
                                    <div class="col-sm-6 col-md-8 h6 mb-0 font-weight-bold text-gray-800">Registros: {{$categoryCount}}</div>
                                    <div class="col-6 col-md-4 p mb-0 text-gray-800 text-right"><a href="{{route('categories.index')}}" class="text-info">Ver</a></div>
                                </div>
                                <hr></hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>  

        

        <!-- Mascotas -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card card-blue border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 font-weight-bold text-center text-uppercase mb-1">Mascotas</div>
                            <hr></hr>
                            <div class="row g-0">
                                <div class="col-sm-6 col-md-8 h6 mb-0 font-weight-bold text-gray-800">Registros: {{$petCount}}</div>
                                <div class="col-6 col-md-4 p mb-0 text-gray-800 text-right"><a href="{{route('pets.index')}}" class="text-info ">Ver </a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Productos -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card card-yellow border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5  font-weight-bold text-uppercase mb-1 text-center">
                            Productos </div>
                                <hr></hr>
                                <div class="row g-0">
                                    <div class="col-sm-6 col-md-8 h6 mb-0 font-weight-bold text-gray-800">Registros: {{$productCount}}</div>
                                    <div class="col-6 col-md-4 p mb-0 text-gray-800 text-right"><a href="{{route('products.index')}}" class="text-info">Ver</a></div>
                                </div>
                                <hr></hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>  

        <!-- Tipos de Mascotas -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card card-blue border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 font-weight-bold text-center text-uppercase mb-1">Tipos de Mascotas</div>
                            <hr></hr>
                            <div class="row g-0">
                                <div class="col-sm-6 col-md-8 h6 mb-0 font-weight-bold text-gray-800">Registros: {{$petTypeCount}}</div>
                                <div class="col-6 col-md-4 p mb-0 text-gray-800 text-right"><a href="{{route('pet_type.index')}}" class="text-info ">Ver </a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Proveedores -->`
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card card-yellow border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5  font-weight-bold text-uppercase mb-1 text-center">
                            Proveedores </div>
                                <hr></hr>
                                <div class="row g-0">
                                    <div class="col-sm-6 col-md-8 h6 mb-0 font-weight-bold text-gray-800">Registros: {{$providerCount}}</div>
                                    <div class="col-6 col-md-4 p mb-0 text-gray-800 text-right"><a href="{{route('providers.index')}}" class="text-info">Ver</a></div>
                                </div>
                                <hr></hr>
                        </div>
                    </div>
                </div>
            </div>
        </div> 

        <!-- Blog -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card card-blue border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 font-weight-bold text-center text-uppercase mb-1">Blog</div>
                            <hr></hr>
                            <div class="row g-0">
                                <div class="col-sm-6 col-md-8 h6 mb-0 font-weight-bold text-gray-800">Registros: {{$blogCount}}</div>
                                <div class="col-6 col-md-4 p mb-0 text-gray-800 text-right"><a href="{{route('blogs.index')}}" class="text-info ">Ver </a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Usuarios -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card card-yellow border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5  font-weight-bold text-uppercase mb-1 text-center">
                            Usuarios </div>
                                <hr></hr>
                                <div class="row g-0">
                                    <div class="col-sm-6 col-md-8 h6 mb-0 font-weight-bold text-gray-800">Registros: {{$userCount}}</div>
                                    <div class="col-6 col-md-4 p mb-0 text-gray-800 text-right"><a href="{{route('admin.index')}}" class="text-info">Ver</a></div>
                                </div>
                                <hr></hr>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>

<div class="mt-5 pt-5 pb-3"></div>

@endsection
