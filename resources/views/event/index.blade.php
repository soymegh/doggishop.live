@extends('layouts.app')

@section('content')
    {{-- listado de event --}}

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Listado de Eventos</h1>
                <a href="{{ route('events.create') }}" class="btn btn-primary">Crear Evento</a>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Imagen</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                                <tr>
                                    <td>{{ $event->id }}</td>
                                    <td>{{ $event->name }}</td>
                                    <td>{{ $event->description }}</td>
                                    <td>{{ $event->image_event }}</td>
                                    <td>
                                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning">Editar</a>
                                        <form action="{{ route('events.destroy', $event->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
