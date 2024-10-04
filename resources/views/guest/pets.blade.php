@extends('components.guest-design', ['title'=>'Mascotas', 'search'=>'home.pets'])
@section('card-body')
<style>
    .animal:hover {
        text-decoration: none;
        border-color: #ffac45;
        color: black;
    }
</style>
<div class="row mt-4">
        @foreach ($pets as $e)
        <div class="col-12 col-md-6 col-lg-3 pb-3">
            <a href="#" data-bs-toggle="modal" data-bs-target="#viewPets{{$e->id}}"  class="card border-mid animal">
            @if ($e->img_url != null)
                <img class="border-mid" src="{{ asset('images/pet/' . $e->img_url) }}" alt="{{ $e->img_url }}" height="250px" >
            @else
                <img class="border-mid" src="{{ asset('images/sinfoto.png') }}" alt="{{ $e->img_url }}">
            @endif

            <div class="card-body">
                <h5 class="card-title text-center">{{ $e->breed }}</h5>
                <p class="card-text">{{ Str::limit($e->description,100) ?? $e->attendant ??$e->name }}</p>
                
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
    {{$pets->links()}}
@endsection
