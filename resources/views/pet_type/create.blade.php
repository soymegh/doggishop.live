@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Pet Type</h1>
        <a href="{{ route('pet_type.index') }}" class="btn btn-primary">Back</a>
        <form action="{{ route('pet_type.store') }}" method="POST" enctype="multipart/form-data">
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
            <button type="submit" class="btn btn-primary">{{ __('Add Pet Type') }}</button>
        </form>
    </div>
@endsection
