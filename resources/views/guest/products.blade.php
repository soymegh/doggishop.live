@php
if(Route::current()->uri()=='categoria/{id}'):
    $search = "home.category";      
else:
    $search = "home.products";
endif;
@endphp

@extends('components.guest-design', ['title'=>'Productos', 'search'=>$search])
@section('card-body')
<div class="row mt-4">
        @foreach ($products as $e)
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
                <p class="card-text  fw-semibold">Precio:

                        @if ($e->price_discounted)
                            <del class="text-danger fw-semibold">${{ $e->price }}</del>
                            <span class="text-success fw-semibold">${{ $e->new_price }}</span>

                        @elseif ($e->price) {{$e->price }}
                        @endif

                    </p>

                <a href="#" data-bs-toggle="modal" data-bs-target="#viewProd{{$e->id}}" title="Detalles de mascota" class="btn btn-outline-info rounded-pill my-auto"><i class="fa-regular fa-xl fa-eye mr-2"></i>Ver detalles</a>
                <div class="border-bottom my-3" ></div>
                
                
                @if ($e->stock >0)
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
        </div>
        <x-picture-modal :element="$e"/>
        @endforeach
        </div>
        {{$products->links()}}

@endsection

