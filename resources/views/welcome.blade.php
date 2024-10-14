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

        h2 {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        .border-mid {
            border-radius: 50px;
        }

        .animal:hover {
            color: #ffac45;
            border-color: #ffac45;
        }

        
        .modal-button{
            background-color: #fbedd3;
            border-color: #ffac45;
        }
        .modal-button:hover{
            background-color: #ffac45;
            border-color: #ffac45;
        }
        .full-image{
            height: 700px;
        }

        .full-image img {
            
            max-height: fit-content;
            
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
                <li data-target="#carrusel" data-slide-to="{{ $i }}"></li>
            @endfor

        </ol>
        <div class="carousel-inner border rounded-3">
            @if ($petTypeInfo)
                @foreach ($petTypeInfo as $typeInfo)
                    <div class="carousel-item @if ($loop->first) active @endif">
                        <img class="d-block w-100" src="{{ asset('images/pet_type/' . $typeInfo->img_url) }}"
                            alt="{{ $typeInfo->name }}" width="400" height="300">
                        <div class="container">
                            <div class="carousel-caption text-left">
                                <h1>{{ $typeInfo->name }}</h1>
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

    <!-- Button trigger modal -->
    @if ($event)
    
    <div class="mx-4 my-4">
        <button type="button" class="btn fs-2 col-12 py-3 modal-button border-2 border-mid" data-bs-toggle="modal" data-bs-target="#eventModal" >
            Le invitamos a nuestros futuros eventos!!
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade " id="eventModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Eventos próximos</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


        <div class="modal-body">
            <div id="carrusel-events" class="carousel slide carousel-fade carousel-dark" data-ride="carousel" data-interval="50000" >

                <ol class="carousel-indicators">
                    @for ($i = 0; $i < count($event); $i++)
                        <li data-target="#carrusel-events" data-slide-to="{{ $i }}"></li>
                    @endfor
                </ol>

                <div class="carousel-inner rounded-3 ">
                    @foreach ($event as $e)
                        <div class="carousel-item @if ($loop->first) active @endif full-image" style="background-color: white;">
                            <img class="d-block mx-auto pl-4" src="{{ asset('images/event/' . $e->image_event) }}"
                                alt="{{ $e->name.' del '.$e->start_date.' al'. $e->end_date }}"  height="500">
                        </div>
                    @endforeach

                        
                    
                </div>
                <a class="carousel-control-prev" href="#carrusel-events" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carrusel-events" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        </div>
    </div>
    </div>
    
    @endif


    <div class="border-bottom text-center mb-5 pt-3">
        <h2>Nuestras variaciones de mascotas</h2>
    </div>
    <br>

    <x-home-cards title="Mascotas Destacadas" index="home.pets.index" :list="$pets" folder="pet" show="home.showPet"/>
    <x-home-cards title="Categorias Destacadas" index="home.category.index" :list="$categories" folder="category" show="home.category"/>



    <div class="container">
        <div class="row mt-4 pb-3">
            <div class="col-6">
                <h2>Últimas Noticias</h2>
            </div>
            <div class="col-6 text-right">
                <a href="{{ route('blogs.post') }}" class="btn p-2 animal border-mid"> {{-- Cambiar por la vista del cliente --}}
                    Ver más
                </a>
            </div>
        </div>
        <!-- Contenido principal de la página -->

        <!-- mostrar blogs  -->
        @if ($blogs)
            <x-list-design :list="$blogs" route="blogs" :admin="false"/>
        @else
            <h3>No hay noticias en este momento</h3>
        @endif


    </div>

    

    



@endsection
