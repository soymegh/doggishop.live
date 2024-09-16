@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class=" col-md-12 border rounded-5 my-5 ">
                <div class="row mt-4 mb-3  ml-1 mr-3">
                    <div class="col">
                        <h1>Crear Evento</h1>
                    </div>    
                    <div class="col text-right  ">
                        <a href="{{ route('events.index') }}" class="btn btn-primary rounded-circle" title="Regresar a Mascotas">
                        <i class=" py-3 fa-solid fa-rotate-left fa-xl"></i>
                        </a>  
                    </div>   
                </div>

                <form class="mb-4  mx-3" action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="description">Descripción</label>
                        <textarea name="description" id="description" class="form-control" required></textarea>
                    </div>
                    {{-- fecha inicio --}}
                    <div class="form-group mb-3">
                        <label for="start_date">Fecha de Inicio</label>
                        <input type="date" name="start_date" id="start_date" class="form-control" required>
                    </div>
                    {{-- fecha fin --}}
                    <div class="form-group mb-3">
                        <label for="end_date">Fecha de Fin</label>
                        <input type="date" name="end_date" id="end_date" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="image_event">Imagen</label>
                        <input type="file" name="image_event" id="image_event" class="form-control" required>
                    </div>

                    <div class="form-group @error('pet_type') has-error @enderror">
                        <label for="pet_type">Selecciona el tipo de mascota:</label>
                        <div class="px-3 row">
                        <select class="form-select col-sm" id="pet_type" name="pet_type">
                            <option value="{{null}}">No aplica</option>
                            @foreach ($petTypes as $pettype)
                            <option value="{{ $pettype->id }}">{{ $pettype->name }}</option>
                            @endforeach
                        </select>
                        <a href="{{ route('pet_type.create') }} " class="col-sm-auto btn btn-success px-5" title="Agregar nuevo"><i class=" py-3 fa-solid fa-plus fa-xl"></i></a>
                        </div>
                        
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
