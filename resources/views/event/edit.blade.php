@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Editar Evento</h1>
                <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
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
                        <input type="file" name="image_event" id="image_event" class="form-control" value="{{$event->image_event}}" required>                   
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
