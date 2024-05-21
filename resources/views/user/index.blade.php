@extends('layouts.app')

@section('content')
<style>
        thead  tr  th {
            background-color: #f3ad55 !important; 
            color: white !important;

        }

        tbody tr td {
            background-color: #f8ead6 !important;

        }
        
</style>
    <div class="container">
        <div class="row my-4">
            <div class="col-md-6">
                <h1>Listado de Usuarios</h1>
            </div>
            <div class="col-md-6 text-end">
             <a href="{{ route('home') }}" class="btn btn-outline-primary">Regresar</a>
            </div>
                
            <a class="mt-5 text-center btn btn-outline-success" href="{{ route('admin.create') }}">Nuevo </a>

        </div>
        <div class="row mt-2">
            <div class="col-12">
                
                <table class="table table-bordered rounded-3 overflow-hidden">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('admin.destroy', $user->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
