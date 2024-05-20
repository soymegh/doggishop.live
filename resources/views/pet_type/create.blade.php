@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class=" col-md-12 border rounded-5 mt-5 ">
                <div class="row mt-3 mb-3  ml-1 mr-3">
                    <div class="col">
                        <h2>Nuevo tipo de mascota</h2>
                    </div>
                    <div class="col text-right  ">
                        <a href="{{ route('pet_type.index') }}" class="btn btn-primary rounded-pill">Regresar</a>
                    </div>
                </div>
                <form class="mb-4  ml-3 mr-3" action="{{ route('pet_type.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group
                        @error('name')
                            has-error
                        @enderror">
                        <label for="name">{{ __('Tipo de Mascota') }}</label>
                        <input type="text" class="form-control" id="name" name="name">
                        @error('name')
                            <span class="help-block text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div
                        class="form-group
                        @error('description')
                            has-error
                        @enderror">
                        <label for="description">{{ __('Descripcion') }}</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        @error('description')
                            <span class="help-block text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('img_url') has-error @enderror">
                        <label for="img_url">{{ __('Foto')}} </label>
                        <input type="file" name="img_url" id="img_url" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-success rounded-pill pl-4 pr-4 fw-bold">{{ __('Agregar tipo de mascota') }}</button>
                </form>
            </div>
        </div>
        
    </div>
@endsection
