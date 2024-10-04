@extends('layouts.app')

@section('content')
<style>
     .border-mid {
            border-radius: 50px;
        }

        .animal:hover {
            
            border-color: #ffac45;
        }
    img{
        
        object-fit: cover;
    }

    .mas:hover {
        color: #ffac45;
        border-color: #ffac45;
    }

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button{
    -webkit-appearance: none;
    margin: 0;
}

input[type=number]{
    -moz-appearance: textfield;
}
</style>
<div class="container">
    <div class="row mt-4 pb-3">
        <div class="col-md-6">
            <h2>{{$title}}</h2>
        </div>
        <div class="col-md-6 text-end">
        <a href="/" title="Regresar a home" class="btn btn-outline-primary rounded-circle"><i class=" py-3 fa-solid fa-home fa-xl"></i></a>
        </div>
    </div>

    <x-search-bar route="{{$search}}"/>

    @yield('card-body')

</div>
@endsection