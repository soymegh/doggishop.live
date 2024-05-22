<!-- resources/views/welcome.blade.php -->
@extends('layouts.app')

@section('content')
<div class="jumbotron">
    <div class="container">
        <h1 class="display-4">¡Bienvenido a DOGGISHOP!</h1>
        <p class="lead">Tu tienda de mascotas en línea.</p>
    </div>
</div>

<h2>Contamos con Distintos tipos de Mascotas</h2>
<!-- Comienzo del carrusel-->
<div id="carrusel" class="carousel slide" data-ride="carousel" data-interval="5000">
<ol class="carousel-indicators">
    @for ($i = 0; $i < count($petTypeInfo); $i++)
        <li data-target="#carrusel" data-slide-to="{{$i}}"></li>
    @endfor
    
</ol>
<div class="carousel-inner">
    @if ($petTypeInfo)
        @foreach ($petTypeInfo as $typeInfo)
        <div class="carousel-item @if ($loop->first) active @endif">
            <img class="d-block w-100" src="{{asset('images/pet_type/' .$typeInfo->img_url)}}" alt="{{$typeInfo->name}}"  width="400"  height="300">
            <div class="container">
                <div class="carousel-caption text-left">
                    <h1>{{$typeInfo->name}}</h1>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <h3>No contamos con tipos de mascotas en este momento</h3>

    @endif
</div>
<a class="carousel-control-prev" href="#carrusel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carrusel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- Fin del carrusel-->

<div class="container">
    <!-- Contenido principal de la página -->
    <h2>Últimas Noticias</h2>
    <!-- mostrar blogs  -->
    @if ($blogs)
        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-12 col md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $blog->title }}</h5>
                            <p class="card-text">{{ $blog->summary }}</p>
                            <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-primary">Leer más</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>   
    @else
        <h3>No hay noticias en este momento</h3>
    @endif

    <h2>Mascotas Destacadas</h2>
    <!-- Aquí mascotas  foto, descripcion y precio-->
    <div class="row">
        @foreach ($pets as $pet)
            <div class="col-12 col md-4">
                <div class="card">
                    {{-- imagen en circulo  --}}
                    <div class="card-img-top rounded-circle mx-auto mt-3" style="width: 150px; height: 150px; background-image: url('{{ asset('images/pet/' . $pet->img_url) }}'); background-size: cover;"></div>
                    {{-- <img src="{{ asset('images/pet/' . $pet->img_url) }}" class="" alt="{{ $pet->name }}"> --}}
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $pet->name }}</h5>
                        <p class="card-text">{{ $pet->description }}</p>
                        <p class="card-text">Precio: ${{ $pet->price }}</p>
                        <a href="{{ route('pets.show', $pet->id) }}" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
