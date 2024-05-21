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
                <h1>Blog Posts</h1> 
            </div>
            <div class="col-md-6 text-end">
                <a class="btn btn-outline-primary" href="{{route('home')}}">Regresar</a>
            </div>

            <a class="mt-5 text-center btn btn-outline-success" href="{{ route('blogs.create') }}">Nuevo Blog</a>

        </div>

        <div class="row">
            <div class="col-12">
                <table class="table table-bordered rounded-3 overflow-hidden">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($blogs as $blogPost)
                            <tr>
                                <td>{{ $blogPost->title }}</td>
                                <td>{{ $blogPost->created_at }}</td>
                                <td>{{ $blogPost->updated_at }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                    {{-- <a href="{{ route('blogs.show', ['blogs' => $blogPost->id]) }}">View</a> --}}
                                    <a href="{{ route('blogs.edit', $blogPost->id) }}" class="btn btn-outline-info ">Edit</a>
                                    <form method="POST" class="fm-inline " action="{{ route('blogs.destroy', $blogPost->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                                    </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
                
@endsection
