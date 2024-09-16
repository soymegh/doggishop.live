@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class=" col-md-12 border rounded-5 my-5 ">
                <div class="row mt-4 mb-3  ml-1 mr-3">
                    <div class="col">
                    <h1>Editar Evento</h1>    
                    </div>
                    
                    <div class="col text-right  ">
                        <a href="{{ route('events.index') }}" class="btn btn-primary rounded-circle" title="Regresar a Mascotas">
                        <i class=" py-3 fa-solid fa-rotate-left fa-xl"></i>
                        </a>  
                    </div>  
                </div>
                
                <form class="mb-4  mx-3" action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="name">{{ __('Nombre') }}</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $event->name }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="description">{{ __('Description') }}</label>
                        <textarea name="description" id="description" class="form-control" required>{{$event->description}}</textarea>
                    </div>
                    {{-- fecha inicio --}}
                    <div class="form-group mb-3">
                        <label for="start_date">{{ __('Fecha de Inicio') }}</label>
                        <input type="date" name="start_date" id="start_date" class="form-control" value="{{date('Y-m-d',strtotime($event->start_date))}}" required>
                    </div>
                    {{-- fecha fin --}}
                    <div class="form-group mb-3">
                        <label for="end_date">{{ __('Fecha de Fin') }}</label>
                        <input type="date" name="end_date" id="end_date" class="form-control" value="{{date('Y-m-d',strtotime($event->end_date)) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="image_event">Imagen</label>
                        <img src="{{ asset('images/event/' . $event->image_event) }}" alt="" class="img-thumbnail mx-auto d-block " width="150px">
                        <input type="file" name="image_event" id="image_event" class="form-control" value="{{$event->image_event}}">                   
                    </div>

                    <div class="form-group @error('pet_type') has-error @enderror">
                        <label for="pet_type">Selecciona el tipo de mascota:</label>
                        <div class="row px-3">
                        <select class="form-select col-sm" id="pet_type" name="pet_type">
                        <option value="{{null}}">No aplica</option>
                            @foreach ($petTypes as $pettype)
                            
                            <option value="{{ $pettype->id }}"  @if ($event->pet_type_id == $pettype->id) selected @endif>{{ $pettype->name }}</option>
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
