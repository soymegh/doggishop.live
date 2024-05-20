@extends('layouts.app')

@section('content')
    <style>
        .titulo {
            text-align: center;
            margin-bottom: 40px;
            color: #333;
        }

        .mascotas .card {
            border: none;
            transition: transform 0.3s ease;
        }

        .mascotas .card:hover {
            transform: scale(1.05);
        }

        .productos .card {
            border: none;
            transition: box-shadow 0.3s ease;
        }

        .productos .card:hover {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-img-top {
            object-fit: cover;
            height: 140px;
        }

        .btn-outline-primary {
            color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .btn-outline-primary:hover {
            background-color: #007bff;
            color: #fff;
        }

        .btn-outline-info {
            color: #17a2b8;
            border-color: #17a2b8;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .btn-outline-info:hover {
            background-color: #17a2b8;
            color: #fff;
        }

        .btn-outline-success {
            color: #28a745;
            border-color: #28a745;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .btn-outline-success:hover {
            background-color: #28a745;
            color: #fff;
        }

        .card {
            border: none;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination .page-link {
            color: #007bff;
            border: 1px solid #007bff;
            padding: 8px 16px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .pagination .page-link:hover {
            background-color: #007bff;
            color: #fff;
        }

        .pagination .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }
    </style>

    <section class="mascotas">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="titulo">Mascotas</h2>
                </div>
                @foreach ($mascotas->take(6) as $mascota)
                    <div class="card col-12 col-md-4 mb-4">
                        <div class="card-body text-center">
                            <div class="mascota text-center">
                                @if ($mascota->img_url)
                                    <img src="{{ asset('images/pet/' . $mascota->img_url) }}" alt="Mascota" width="150px"
                                        height="150px"
                                        class="rounded-circle shadow-lg transition-transform duration-300 hover:scale-110 mb-3">
                                @else
                                    <img src="{{ asset('images/sinfoto.png') }}" alt="sinfoto" width="150px"
                                        height="150px"
                                        class="rounded-circle shadow-lg transition-transform duration-300 hover:scale-110 mb-3">
                                @endif
                                <div class="contenido mt-4">
                                    <h3 class="fw-bold text-dark">{{ $mascota->name }}</h3>
                                    <p class="text-muted mb-3">{{ $mascota->breed }} | <span
                                            class="text-primary fw-semibold">${{ $mascota->price }}</span></p>
                                    <a href="{{ route('home.showPet', $mascota->id) }}"
                                        class="btn btn-outline-primary btn-sm transition-colors duration-300 hover:bg-primary hover:text-white">Ver
                                        más</a>
                                </div>
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
                        <div class="card shadow-sm">
                            @if ($product->picture != null)
                                <img src="{{ asset('images/product/' . $product->picture) }}" alt="Producto"
                                    class="card-img-top" height="140px" style="object-fit: cover;">
                            @else
                                <img src="{{ asset('images/sinfoto.png') }}" alt="sinfoto" class="card-img-top"
                                    height="140px" style="object-fit: cover;">
                            @endif
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold text-dark">{{ $product->name }}</h5>
                                <p class="card-text text-muted">{{ Str::limit($product->description, 30) }}</p>
                                <p class="card-text text-primary fw-semibold">Precio: ${{ $product->price }}</p>
                                <a href="{{ route('home.showProduct', $product->id) }}"
                                    class="btn btn-outline-info btn-sm mb-2">Ver más</a>
                                <form action="{{ route('inventary.store') }}" method="POST" class="d-inline-block">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                    <input type="hidden" name="description" value="Salida">
                                    <div class="d-flex justify-content-center align-items-center mb-2">
                                        <input type="number" name="quantity" value="1"
                                            class="form-control form-control-sm text-center me-2" style="width: 60px;">
                                        <button type="submit" class="btn btn-outline-success btn-sm">Comprar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
          
            </div>
        </div>
    </section>
@endsection
