@extends('layouts.app')

@section('content')
    <div class="container">
        
        <x-title-admin title="Tipos de pago" route="payment_type"/>
        <x-list-design :list="$paymentTypes" route="payment_type" :admin="true"/>

        {{$paymentTypes->links()}}
    </div>
@endsection
