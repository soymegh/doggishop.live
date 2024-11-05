<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request){
            $categories = Category::whereAny(['name','description'],'LIKE','%'.$request->get('search').'%')->paginate(8);
        }
        else{
            $categories = Category::paginate(8);
        }
        
        return view('category.index', compact('categories'));
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
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->role != 'admin') {
            return redirect()->route('welcome');
        }
        try{
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();


        /*Guardar picture*/
        if ($request->hasFile('img_url')) {

            $id = $category->id;
            $imageName = $id . '.' . $request->file('img_url')->getClientOriginalExtension();
            $request->file('img_url')->move(public_path('images/category'), $imageName);
            $category->img_url = $imageName;
            $category->save();
        }

        return redirect()->route('categories.index')->with('success', 'Categoria ingresada correctamente');
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        if (auth()->user()->role != 'admin') {
            return redirect()->route('welcome');
        }
        $category = Category::find($id);
        return view('category.show', compact('category'));
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
        $category = Category::find($id);
        return view('category.edit', compact('category'));
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

        try {
            
            $category = Category::find($id);
            $category->name = $request->name;
            $category->description = $request->description;

            if ($request->hasFile('img_url')) {
                // Delete the previous image, if it exists
                if (!empty($category->img_url) && file_exists(public_path('images/category/' . $category->img_url))) {
                    File::delete(public_path('images/category/' . $category->img_url));
                }

                // Generate a new image name using the ID
                $imageName = $id . '.' . $request->img_url->extension();
                // Move the new image to the desired location
                $request->img_url->move(public_path('images/category'), $imageName);
                // Assign the new image name to the blog
                $category->img_url = $imageName;
            }

            $category->save();

            return redirect()->route('categories.index')->with('success', 'Categoria actualizada correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        if (auth()->user()->role != 'admin') {
            return redirect()->route('welcome');
        }
        try{

        
        $category = Category::find($id);

        if (!empty($category->img_url) && file_exists(public_path('images/category/' . $category->img_url))) {
            File::delete(public_path('images/category/' . $category->img_url));
        }

        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Categoria eliminada correctamente');
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
        
    }
}
