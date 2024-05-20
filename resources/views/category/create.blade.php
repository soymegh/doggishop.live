@extends('layouts.app')

@section('content')
    <div class="container ">
        
        
        <div class="row">
            <div class=" col-md-12 border rounded-5 mt-5 ">
                

                <div class="row mt-3 mb-3  ml-1 mr-3">
                    
                    <div class="col">
                        <h2>Nueva Categoría</h2>
                    </div>
                    <div class="col text-right  ">
                        <a href="{{ route('categories.index') }}" class="btn btn-primary rounded-pill">Regresar</a>
                    </div>
                </div>


                <form class="mb-4  ml-3 mr-3" action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group
                        @error('name')
                            has-error
                        @enderror">

                        <label for="name">Nombre</label>
                        <input required type="text" name="name" id="name" class="form-control"
                            value="{{ old('name') }}">
                        @error('name')
                            <span class="help-block
                            text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group
                        @error('description')
                            has-error
                        @enderror">
                        <label for="description">Descripción</label>
                        <textarea required name="description" id="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="help-block
                            text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- foto --}}
                    <div class="form-group">
                        <label for="img_url">Imagen</label>
                        <input type="file" name="img_url" id="img_url" class="form-control" 
                            value="{{ old('img_url') }}" accept="image/*" >
                    </div>
                    <button type="submit" class="btn btn-success rounded-pill pl-4 pr-4 fw-bold">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
