@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 border rounded-5 my-5">
                <div class="row mt-4 mb-3  ml-1 mr-3">
                    <h2 class="col">Editar proveedor</h2>
                    <div class="col text-right">
                        <a class="btn btn-primary rounded-pill" href="{{ route('providers.index') }}">Regresar</a>
                    </div>
                </div>
                <form action="{{ route('providers.update', $provider->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group @error('name') has-error @enderror">
                        <label for="name">{{ __('Nombre') }} </label>
                        <input readonly type="text" class="form-control" id="name" name="name"
                            value="{{ $provider->name }}">
                        @error('name')
                            <span class="help-block text-danger">{{ $message }} </span>
                        @enderror
                    </div>
                    <div class="form-group
                        @error('attendant') has-error @enderror">
                        <label for="attendant">{{ __('Asistente') }} </label>
                        <input readonly type="text" class="form-control" id="attendant" name="attendant"
                            value="{{ $provider->attendant }}">
                        @error('attendant')
                            <span class="help-block text-danger">{{ $message }} </span>
                        @enderror
                    </div>
                    <div class="form-group @error('email') has-error @enderror">
                        <label for="email">{{ __('Email') }} </label>
                        <input readonly type="email" class="form-control" id="email" name="email"
                            value="{{ $provider->email }}">
                        @error('email')
                            <span class="help-block text-danger">{{ $message }} </span>
                        @enderror
                    </div>
                    <div class="form-group @error('phone') has-error @enderror">
                        <label for="phone">{{ __('Telefono') }} </label>
                        <input readonly type="phone" class="form-control" id="phone" name="phone"
                            value="{{ $provider->phone }}">
                        @error('phone')
                            <span class="help-block text-danger">{{ $message }} </span> 
                        @enderror
                    </div>
                    <div class="form-group @error('website') has-error @enderror">
                        <label for="website">{{ __('Sitio Web') }} </label>
                        <input readonly type="text" class="form-control" id="website" name="website"
                            value="{{ $provider->website }}">
                        @error('website')
                            <span class="help-block text-danger">{{ $message }} </span>
                        @enderror
                    </div>
                    <div class="form-group @error('img_url') has-error @enderror">
                        <label for="img_url">Imagen</label>
                        <input readonly type="file" name="img_url" id="img_url" class="form-control"
                            value="{{ $provider->img_url }}" accept="image/*">
                        @error('img_url')
                            <span class="help-block text-danger">{{ $message }} </span>
                        @enderror
                    </div>
                    
                </form>
            </div>
        </div>
    </div>   
@endsection