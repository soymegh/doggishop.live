@extends('layouts.app')

@section('content')
    <div class="container">

        <x-title-admin title="Registro de Blogs" route="blogs"/>
        <x-list-design :list="$blogs" route="blogs" :admin="true"/>
        {{$blogs->links()}}
@endsection
