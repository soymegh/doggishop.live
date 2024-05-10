@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Crear proveedor</h2>
            <a href="{{ route('providers.index') }}">Regresar</a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('providers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group @error('name') has-error @enderror">
                        <label for="name">{{ __('Nombre') }} </label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name') }}">
                        @error('name')
                            <span class="help-block text-danger">{{ $message }} </span>
                        @enderror
                    </div>
                    <div class="form-group @error('attendant') has-error @enderror">
                        <label for="attendant">{{ __('Asistente') }} </label>
                        <input type="text" class="form-control" id="attendant" name="attendant"
                            value="{{ old('attendant') }}">
                        @error('attendant')
                            <span class="help-block text-danger">{{ $message }} </span>
                        @enderror
                    </div>

                    <div class="form-group @error('email') has-error @enderror">
                        <label for="email">{{ __('Email') }} </label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email') }}">
                        @error('email')
                            <span class="help-block text-danger">{{ $message }} </span>
                        @enderror
                    </div>

                    <div class="form-group @error('phone') has-error @enderror">
                        <label for="phone">{{ __('Telefono') }} </label>
                        <input type="phone" class="form-control" id="phone" name="phone"
                            value="{{ old('phone') }}">
                        @error('phone')
                            <span class="help-block text-danger">{{ $message }} </span>
                        @enderror
                    </div>

                    <div class="form-group @error('website') has-error @enderror">
                        <label for="website">{{ __('Sitio Web') }} </label>
                        <input type="text" class="form-control" id="website" name="website"
                            value="{{ old('website') }}">
                        @error('website')
                            <span class="help-block text-danger">{{ $message }} </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="img_url">Imagen</label>
                        <input type="file" name="img_url" id="img_url" class="form-control"
                            value="{{ old('img_url') }}" accept="image/*">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
