@extends('layouts.app')

@section('content')
    <div class="container text-center my-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="mb-4">Mascota</h1>
                <div class="card shadow-sm">
                    <div class="card-body">
                        @if ($mascota->img_url != null)
                            <img src="{{ asset('images/pet/' . $mascota->img_url) }}" class="img-thumbnail mb-3" alt="mascota"
                                style="width: 150px; height: 150px; object-fit: cover;">
                        @else
                            <img src="{{ asset('images/sinfoto.png') }}" class="img-thumbnail mb-3" alt="sinfoto"
                                style="width: 150px; height: 150px; object-fit: cover;">
                        @endif
                        <h4 class="card-title text-dark fw-bold">{{ $mascota->name }}</h4>
                        <p class="card-text text-info">{{ $mascota->breed }}</p>
                        @if ($mascota->price_discounted)
                            <del class="text-danger fw-semibold">${{ $mascota->price }}</del>
                            <span class="text-success fw-semibold">${{ $mascota->new_price }}</span>
                        @else
                            <span class="text-primary fw-semibold">${{ $mascota->price }}</span>
                        @endif
                        <p class="text-muted mb-3"> ⬇️ {{ $mascota->price_discounted }} </p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('home') }}" class="btn btn-outline-info btn-sm">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
