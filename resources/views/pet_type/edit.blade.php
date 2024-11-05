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
            <div class=" col-md-12 border rounded-5 mt-5 ">
                <div class="row mt-3 mb-3  ml-1 mr-3">
                    <div class="col">
                        <h2>Editar tipo de mascota</h2>
                    </div>
                    <div class="col text-right  ">
                    <a href="{{ route('pet_type.index') }}" class="btn btn-primary rounded-circle" title="Regresar a Tipos de Mascotas">
                    <i class=" py-3 fa-solid fa-rotate-left fa-xl"></i>
                    </a>
                    </div>
                </div>
                <form class="mb-4  ml-3 mr-3" action="{{ route('pet_type.update', $petType->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div
                        class="form-group
                    @error('name')
                        has-error
                    @enderror">

                        <label for="name">Tipo de Mascota</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ $petType->name }}">
                        @error('name')
                            <span class="help-block text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('description') has-error  @enderror">
                        <label for="description">Descripción</label>
                        <textarea name="description" id="description" class="form-control" rows="3">{{ $petType->description }}</textarea>
                        @error('description')
                            <span class="help-block text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row form-group  @error('img_url') has-error @enderror">
                        <label for="img_url">{{ __('Foto') }} </label>
                        <div class="col col-sm-2">
                            @if ($petType->img_url)
                                <img src="{{ asset('images/pet_type/' . $petType->img_url) }}" alt="" class="img-thumbnail  mx-auto my-auto d-block " width="150px">
                            @else
                                <img class="border-mid" src="{{ asset('images/sinfoto.png') }}" alt="No hay una imagen actual disponible">
                            @endif
                            
                        </div> 
                        <div class="col">
                            <input type="file" name="img_url" id="img_url" accept="image/*" class="form-control">
                        </div>   
                    </div>
                    
                    

                    <button type="submit" class="btn btn-success rounded-pill pl-4 pr-4 fw-bold">Actualizar Tipo de Mascota</button>
                </form>
            </div>
        </div>
    @endsection
