@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Crear Evento</h1>
                <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
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
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
