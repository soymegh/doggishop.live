@extends('layouts.app')

@section('content')
    <div class="container">
        
        <x-table-cards route="products" folder="product" :list="$products" title="Productos" />
        {{$products->links()}}

    </div>
@endsection
