@extends('layouts.app')

@section('content')
    <section class="mascotas">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="titulo">Mascotas</h2>
                </div>
                @foreach ($mascotas as $mascota)
                    <div class="col-12 col-md-4">
                        <div class="mascota text-center">
                            <img src="{{ asset('images/pet/' . $mascota->img_url) }}" alt="Mascota" width="150px"
                                height="150px" class="rounded-circle">

                            <div class="contenido">
                                <h3>{{ $mascota->name }}</h3>
                                <p>{{ $mascota->breed }} | $ {{ $mascota->price }} <a href="{{ route('pets.show', $mascota->id) }}" class="btn btn-outline-info">Ver más</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="productos">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="titulo">Productos</h2>
                </div>
                @foreach ($productos as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('images/product/' . $product->picture) }}" alt="Producto"
                                class="card-img-top" height="140px">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ substr($product->description, 0, 30) }}  </p>
                                <p class="card-text">Precio: $ {{ $product->price }}</p>
                                <a href="{{ route('home.showProduct', $product->id) }}" class="btn btn-outline-info">Ver más</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="blog">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="titulo">Posts</h2>
                </div>
                <div class="col-12">
                    @foreach ($posts as $post)
                        <div class="card mb-4">
                            <div class="card-header bg-primary">
                                <h2 class="text-white">{{ $post->title }}</h2>
                            </div>
                            <div class="card-body">
                                <p>{{ $post->content }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
