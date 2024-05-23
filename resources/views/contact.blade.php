@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Contacto
        </div>
        <div class="card-body">
            <form action="{{ route('contact.send') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nombre:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email" required class="form-control">
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Mensaje:</label>
                    <textarea id="message" name="message" rows="4" required class="form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-success">Enviar</button>
            </form>
        </div>
    </div>
@endsection
