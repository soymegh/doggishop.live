@extends('layouts.app')

@section('content')
<style>
     .border-mid {
            border-radius: 50px;
        }

        .animal:hover {
            
            border-color: #ffac45;
        }
    img{
        
        object-fit: cover;
    }

    .mas:hover {
        color: #ffac45;
        border-color: #ffac45;
    }

</style>

<div class="container mb-4">
    <div class="">
        <div class="row my-4">
            <div class="col-6">
                <h2>Categorías</h2>
            </div>
            <div class="col-6 text-right">
            <a href="/" title="Regresar a home" class="btn btn-outline-primary rounded-circle"><i class=" py-3 fa-solid fa-home fa-xl"></i></a>
            </div>
        </div>
        
        <x-search-bar route="home.category"/>

        <div class="row mt-4">
        @foreach ($category as $pet)
            <div class="col-12 col-sm-6 col-md-3 pb-3">
                <div class="card border-mid">
                    <a href="{{route('home.category', $pet->id)}}" class="btn p-0 animal border-mid">
                        <div class="card-img-top m-0 border-mid" style="height: 150px; background-image: url('{{ asset('images/category/' . $pet->img_url ?? " ") }}'); background-size: cover;"></div>
                        
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $pet->breed ?? $pet->name ?? " "}}</h5>
                            <p class="card-text">{{ $pet->description }}</p>
                            <p class="card-text">
                                
                            </p>
                            
                            @if ($pet->price_discounted) {{"Precio: "}}
                            <del class="text-danger fw-semibold">${{ $pet->price }}</del>
                            <span class="text-success fw-semibold">${{ $pet->new_price }}</span>
                            
                            @elseif ($pet->price) {{"Precio: $".$pet->price }}
                            
                            @endif 
                            
                            

                            
                        </div>
                    </a>
                    {{-- <img src="{{ asset('images/pet/' . $pet->img_url) }}" class="" alt="{{ $pet->name }}"> --}}
                    
                </div>
            </div>
        @endforeach
        {{$category->links()}}
        </div>
        
    </div>
</div>

@endsection