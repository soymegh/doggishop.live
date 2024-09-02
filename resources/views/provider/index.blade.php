@extends('layouts.app')

@section('content')
    <div class="container">
    <x-table-cards route="providers" folder="provider" :list="$providers" title="Proveedores de productos" />
    {{$providers->links()}}
        
@endsection
