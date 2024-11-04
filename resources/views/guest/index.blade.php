@extends('layouts.app')

@section('content')
<style>
     .border-mid {
            border-radius: 50px;
        }

    .animal:hover {
        text-decoration: none;
        border-color: #ffac45;
        color: black;
    }
    img{
        object-fit: cover;
    }

    .mas:hover {
        color: #ffac45;
        border-color: #ffac45;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button{
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number]{
        -moz-appearance: textfield;
    }
</style>

    <section class="mascotas">
        <div class="container">
        <div class="row mt-4 pb-3">
            <div class="col-6">
                <h2>Mascotas</h2>
            </div>
            <div class="col-6 text-right">
                <a href="{{ route('home.pets.index') }}" class="btn p-2 mas border-mid"> {{-- Cambiar por la vista del cliente --}}
                    Ver más
                </a>
            </div>
        </div>

        <div class="row mt-4">
        @foreach ($mascotas->take(8) as $e)
        <div class="col-12 col-md-6 col-lg-3 pb-3">
            <a href="#" class="card border-mid animal" data-bs-toggle="modal" data-bs-target="#viewPet{{$e->id}}" >
            @if ($e->img_url != null)
                <img class="border-mid" src="{{ asset('images/pet/' . $e->img_url) }}" alt="{{ $e->img_url }}" height="250px" >
            @else
                <img class="border-mid" src="{{ asset('images/sinfoto.png') }}" alt="{{ $e->img_url }}">
            @endif

            <div class="card-body">
                <h5 class="card-title text-center">{{ $e->breed }}</h5>
                <p class="card-text">{{ Str::limit($e->description, 100) ?? $e->attendant ?? $e->name }}</p>
                
                <div class="border-bottom mb-3" ></div>
                
                <div class="d-flex justify-content-evenly">
                @if ($e->price_discounted)
                    <del class="text-danger fw-semibold">${{ $e->price }}</del>
                    <span class="text-success fw-semibold">${{ $e->new_price }}</span>
                @else
                    <span class="text-primary fw-semibold">${{ $e->price }}</span>
                @endif
                </div>
            </div>

            </a>
            <x-picture-modal :element="$e"/>
        </div>
        @endforeach
        </div>
            
        </div>
    </section>
    <div class="container">
    <div class="border-bottom my-5" ></div>
    </div>
    <section class="productos">
        <div class="container">
        <div class="row mt-4 pb-3">
            <div class="col-6">
                <h2>Productos</h2>
            </div>
            <div class="col-6 text-right">
                <a href="{{ route('home.products.index') }}" class="btn p-2 mas border-mid"> {{-- Cambiar por la vista del cliente --}}
                    Ver más
                </a>
            </div>
        </div>

        <div class="row mt-4">
        @foreach ($products_discounts->take(8) as $e)
            <div class="col-12 col-md-6 col-lg-4 pb-3">
                <div class="card border-mid animal">
                @if ($e->picture != null)
                    <img class="border-mid"height="240px"  src="{{ asset('images/product/' . $e->picture) }}" alt="{{ $e->picture }}" height="250px" >
                @else
                    <img class="border-mid" height="240px" src="{{ asset('images/sinfoto.png') }}" alt="{{ $e->picture }}">
                @endif

                <div class="card-body text-center">
                    <div class="row">

                    </div>

                    <h5 class="card-title fw-bold text-dark">{{ $e->name }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($e->description, 30) }}</p>
                    <p class="card-text text-primary fw-semibold">Precio:

                        @if ($e->price_discounted)
                            <del class="text-danger fw-semibold">${{ $e->price }}</del>
                            <span class="text-success fw-semibold">${{ $e->new_price }}</span>

                        @elseif ($e->price) {{$e->price }}
                        @endif

                    </p>

                    

                    <a href="#"  data-bs-toggle="modal" data-bs-target="#viewProd{{$e->id}}" title="Detalles de mascota" class="btn btn-outline-info rounded-pill my-auto"><i class="fa-regular fa-xl fa-eye mr-2"></i>Ver detalles</a>
                    <div class="border-bottom my-3" ></div>


                    @if ($e->stock)
                        <form action="{{ route('inventary.store') }}" method="POST" class="d-inline-block">
                        @csrf
                            <input type="hidden" name="product_id" value="{{ $e->id }}">
                            <input type="hidden" name="price" value="{{ $e->price }}">
                            <input type="hidden" name="description" value="Salida">
                            <div class="d-flex justify-content-center align-items-center mb-2">
                                <input type="number" name="quantity" value="1" class="form-control form-control-sm text-center me-2" style="width: 60px;" min="1" required>
                                <button type="submit" class="btn btn-outline-success btn-sm rounded-pill"><i class="fa-solid fa-cart-shopping fa-xl mx-2 my-3"></i>Agregar a carrito</button>
                            </div>
                        </form>
                    @else
                        <b class="text-danger">No hay existencias</b>
                    @endif


                    

                </div>

                </div>

                <x-picture-modal :element="$e"/>
            </div>
        @endforeach
        </div>



           
        </div>
    </section>
@endsection
