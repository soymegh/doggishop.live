@extends('layouts.app')

@section('content')
<div class="container">
<div class="card px-0 mt-5 mx-3">

        <div class="card-header">
        <h2 class="fs-3">Correo de contacto</h2>
            
        
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

                <button type="submit" class="btn btn-success rounded-pill px-4 py-2 "><i class="fa-regular fa-paper-plane fa-lg mr-2"></i>Enviar</button>
            </form>
        </div>
    </div>
</div>
    
@endsection
