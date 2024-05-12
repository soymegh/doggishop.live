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
            <img class="d-block w-100" src="{{asset('images/pet_type/' .$typeInfo->img_url)}}" alt="{{$typeInfo->name}}"  width="400"  height="500">
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
    <!-- Aquí puedes mostrar las últimas noticias -->
    <h2>Destacados</h2>
    <!-- Aquí puedes mostrar los elementos destacados de tu sitio -->
</div>
@endsection
