@extends('layouts.app')

@section('content')
    <div class="container">
        <x-title-admin title="Listado de Usuarios" route="admin" />
        <x-list-design :list="$users" route="admin" :admin="true"/>
        
    </div>
@endsection
