@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Blog Posts</h1>
                <a href="{{route('home')}}">Regresar</a>
                <a class="text-right" href="{{ route('blogs.create') }}">Create Blog Post</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <table class="table">
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
                                    {{-- <a href="{{ route('blogs.show', ['blogs' => $blogPost->id]) }}">View</a> --}}
                                    <a href="{{ route('blogs.edit', $blogPost->id) }}">Edit</a>
                                    <form method="POST" class="fm-inline" action="{{ route('blogs.destroy', $blogPost->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
                
@endsection