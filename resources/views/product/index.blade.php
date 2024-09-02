@extends('layouts.app')

@section('content')
<style>
        thead  tr  th {
            background-color: #f3ad55 !important; 
            color: white !important;

        }

        tbody tr td {
            background-color: #f8ead6 !important;

        }
        
</style>
    <div class="container">
        
        <x-table-cards route="products" folder="product" :list="$products" title="Productos" />
        {{$products->links()}}

    </div>
@endsection
