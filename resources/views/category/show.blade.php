@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card" style="width: 18rem;">
            <img src="{{ asset('images/category/' . $category->img_url) }}  " class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"> Categoría</h5>
                
                <h3 class="card-text">
                    {{ $category->name }}
                </h3>
                <p>
                    {{ $category->description }}
                </p>
                <a href="{{ route('categories.index') }}" class="btn btn-primary">Regresar</a>
            </div>
        </div>



    </div>
@endsection
