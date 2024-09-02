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

        <x-title-admin title="Registro de Blogs" route="blogs"/>
        <x-list-design :list="$blogs" route="blogs" :admin="true"/>
        {{$blogs->links()}}
@endsection
