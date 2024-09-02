@extends('layouts.app')

@section('content')
    <div class="container">
        <x-table-cards route="pets" folder="pet" :list="$pets" title="Mascotas" />
        {{$pets->links()}}
    </div>
@endsection
