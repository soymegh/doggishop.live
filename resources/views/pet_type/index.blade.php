@extends('layouts.app')

@section('content')

    <div class="container">

        <x-table-cards route="pet_type" folder="pet_type" :list="$petTypes" title="Tipos de Mascotas" />
        {{$petTypes->links()}}
    </div>
@endsection
