@extends('layouts.app')

@section('content')
    <div class="card">message
        <div class="card-header">
            Contact Us
        </div>
        <div class="card-body">
            <form action="{{route('contact.send')}}" method="POST" >
                @csrf

                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" class="form-control" required><br><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required class="form-control"><br><br>

                <label for="message">Mensaje:</label><br>
                <textarea id="" name="message" rows="4" cols="50" required class="form-control"></textarea><br><br>

                <input type="submit" value="Submit" class="btn btn-outline-success">
            </form>

        </div>
    </div>
@endsection
