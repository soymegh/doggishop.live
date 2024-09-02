@extends('layouts.app')

@section('content')
    {{-- listado de event --}}

    <div class="container">
    <x-table-cards folder="event" title="Eventos" route="events" :list="$events" />
    </div>
@endsection
