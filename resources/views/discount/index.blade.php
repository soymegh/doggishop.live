@extends('layouts.app')

@section('content')
    {{-- listado de Descuentos --}}

    
    

    <div class="container">
    <x-title-admin title="Gestionar Descuentos" route="discounts"/>
    <x-list-design :list="$discounts" route="discounts" admin="true"/>
    </div>
@endsection
