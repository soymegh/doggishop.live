<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if (auth()->user()->role != 'admin') {
            return redirect()->route('welcome');
        }

        if($request){
            $blogs = Blog::whereAny(['title','created_at'],'LIKE','%'.$request->get('search').'%')->paginate(8);
        }
        else{
            $blogs = Blog::paginate(8);
        }

        
        return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (auth()->user()->role != 'admin') {
            return redirect()->route('welcome');
        }
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if (auth()->user()->role != 'admin') {
            return redirect()->route('welcome');
        }
        try{
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->content = $request->content;
        $blog->user_id = auth()->id();
        $blog->save();
        return redirect()->route('blogs.index')->with('success', 'Blog ingresado correctamente');
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al intentar ingresar la entrada de Blog');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $blog = Blog::find($id);
        return view('blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        if (auth()->user()->role != 'admin') {
            return redirect()->route('welcome');
        }
        $blog = Blog::find($id);
        return view('blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if (auth()->user()->role != 'admin') {
            return redirect()->route('welcome');
        }
        try{
        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->content = $request->content;
        $blog->user_id = auth()->id();
        $blog->save();
        return redirect()->route('blogs.index')->with('success', 'Blog actualizado correctamente');
        }catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al actualizar la entrada de Blog');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try{
        if (auth()->user()->role != 'admin') {
            return redirect()->route('welcome');
        }

        $blog = Blog::find($id);
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog eliminado correctamente');
        }catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al intentar eliminar la entrada de Blog');
        }
    }

    public function posts()
    {
        $posts = Blog::paginate(6);
        return view('blog.posts', compact('posts'));
    }
}