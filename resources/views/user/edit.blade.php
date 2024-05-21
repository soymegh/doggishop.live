@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 border rounded-5 my-5">
            <div class="row mt-4 mb-3  ml-1 mr-3">
                <h2 class="col">Editar Usuario</h2>
                <div class="col text-right">
                    <a href="{{ route('admin.index') }}" class="btn btn-primary rounded-pill">Regresar</a>
                </div> 
            </div>
            <form action="{{ route('admin.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                </div>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                </div>
                <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
                    <label for="role">Role</label>
                    <select class="form-control" id="role" name="role">
                        <option value="">Select Role</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                        <option value="guest" {{ $user->role == 'guest' ? 'selected' : '' }}>Guest</option>
                    </select>
                    <span class="text-danger">{{ $errors->first('role') }}</span>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
@endsection