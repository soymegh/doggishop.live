@extends('layouts.app')

@section('content')
<style>
    .files input {
        outline: 2px dashed #92b0b3;
        outline-offset: -10px;
        -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
        transition: outline-offset .15s ease-in-out, background-color .15s linear;
        padding: 120px 0px 85px 35%;
        text-align: center !important;
        margin: 0;
        width: 100% !important;
    }

    .files input:focus {
        outline: 2px dashed #92b0b3;
        outline-offset: -10px;
        -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
        transition: outline-offset .15s ease-in-out, background-color .15s linear;
        border: 1px solid #92b0b3;
    }

    .files {
        position: relative
    }

    .files:after {
        pointer-events: none;
        position: absolute;
        top: 60px;
        left: 0;
        width: 50px;
        right: 0;
        height: 56px;
        content: "";
        background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
        display: block;
        margin: 0 auto;
        background-size: 100%;
        background-repeat: no-repeat;
    }

    .color input {
        background-color: #f1f1f1;
    }

    .files:before {
        position: absolute;
        bottom: 10px;
        left: 0;
        pointer-events: none;
        width: 100%;
        right: 0;
        height: 57px;
        display: block;
        margin: 0 auto;
        color: #2ea591;
        font-weight: 600;
        text-transform: capitalize;
        text-align: center;
    }
</style>
<div class="container">
    
    <div class="row">
        <div class="col-md-12 border rounded-5 my-5">
        <div class="row mt-4 mb-3  ml-1 mr-3">
            <h2 class="col">Crear proveedor</h2>
            <div class="col text-right">
                <a class="btn btn-primary rounded-pill" href="{{ route('providers.index') }}">Regresar</a>
            </div>       
        </div>
            <form action="{{ route('providers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="container mt-5">
                    <div class="row">

                        <div class="col-6 form-group @error('name') has-error @enderror">
                            <label for="name">{{ __('Nombre') }} </label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="help-block text-danger">{{ $message }} </span>
                            @enderror
                        </div>

                        <div class="col-6 form-group @error('attendant') has-error @enderror">
                            <label for="attendant">{{ __('Asistente') }} </label>
                            <input type="text" class="form-control" id="attendant" name="attendant"
                                value="{{ old('attendant') }}">
                            @error('attendant')
                                <span class="help-block text-danger">{{ $message }} </span>
                            @enderror
                        </div>

                    </div>
                </div>

                <div class="container mt-3">
                    <div class="row">
                        <div class="col-6 form-group @error('email') has-error @enderror">
                            <label for="email">{{ __('Email') }} </label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                                <span class="help-block text-danger">{{ $message }} </span>
                            @enderror
                        </div>

                        <div class="col-6 form-group @error('phone') has-error @enderror">
                            <label for="phone">{{ __('Telefono') }} </label>
                            <input type="phone" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <span class="help-block text-danger">{{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group @error('website') has-error @enderror">
                    <label for="website">{{ __('Sitio Web') }} </label>
                    <input type="text" class="form-control" id="website" name="website" value="{{ old('website') }}">
                    @error('website')
                        <span class="help-block text-danger">{{ $message }} </span>
                    @enderror
                </div>


                <div class="form-group files color">
                    <label for="img_url">Imagen</label>
                    <input type="file" name="img_url" id="img_url" class="form-control" value="{{ old('img_url') }}"
                        accept="image/*">
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>
@endsection