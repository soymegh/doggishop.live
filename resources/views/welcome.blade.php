<!-- resources/views/welcome.blade.php -->
@extends('layouts.app')

@section('content')
<style>
    .carousel .carousel-item {
        height: 500px;
    }

    .carousel-item img {
        position: absolute;
        object-fit: cover;
        top: 0;
        left: 0;
        min-height: 500px;
    }

    h2{
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
    .border-mid{
        border-radius: 50px;
    }
    .animal:hover{
        color: #ffac45;
        border-color: #ffac45;
    }
</style>


<div class="jumbotron mx-0">
    <div class="container">
        <h1 class="display-4">¡Bienvenido a DOGGISHOP!</h1>
        <p class="lead">Tu tienda de mascotas en línea.</p>
    </div>
</div>

<!-- Comienzo del carrusel-->
<div id="carrusel" class="carousel slide px-5 my-4" data-ride="carousel" data-interval="5000">

<ol class="carousel-indicators">
    @for ($i = 0; $i < count($petTypeInfo); $i++)
        <li data-target="#carrusel" data-slide-to="{{$i}}"></li>
    @endfor
    
</ol>
<div class="carousel-inner border rounded-3">
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
<div class="border-bottom text-center mb-5 pt-3">
<h2>Nuestras variaciones de mascotas</h2>
</div>
<br>

{{-- Inicio Componente --}}
<div class="container mascots">`
    <div class="">
        <div class="row mt-4">
            <div class="col-6">
                <h2>Mascotas destacadas</h2>
            </div>
            <div class="col-6 text-right">
                <a href="{{ route('pets.index') }}" class="btn p-2 animal border-mid"> {{-- Cambiar por la vista del cliente--}}
                    Ver más
                </a>
            </div>
        </div>    
    
        <div class="row mt-4">
        @foreach ($pets as $pet)
            <div class="col-3 col md-4 ">
                <div class="card border-mid">
                    <a href="{{ route('pets.show', $pet->id) }}" class="btn p-0 animal border-mid">
                        <div class="card-img-top m-0 border-mid" style="height: 150px; background-image: url('{{ asset('images/pet/' . $pet->img_url) }}'); background-size: cover;"></div>
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $pet->breed }}</h5>
                            <p class="card-text">{{ $pet->description }}</p>
                            <p class="card-text">Precio: ${{ $pet->price }}</p>
                        </div>
                    </a>
                    {{-- <img src="{{ asset('images/pet/' . $pet->img_url) }}" class="" alt="{{ $pet->name }}"> --}}
                    
                </div>
            </div>
        @endforeach
        </div>

    </div>
</div>
{{-- Fin Componente --}}

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

    
</div>
@endsection
