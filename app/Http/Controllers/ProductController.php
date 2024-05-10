<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Provider;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    
        try {
            $products = Product::all();
            return view('product.index', compact('products'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al obtener los productos');
        }
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
        try {
            $categories = Category::all();
            $providers = Provider::all();
            return view('product.create', compact('categories', 'providers'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al mostrar el formulario');
        }
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
        try {

            //return $request;
            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->size = $request->size;
            $product->price = $request->price;
            $product->category_id = $request->category_id;
            $product->provider_id = $request->provider_id;
            $product->save();

            if ($request->hasFile('img_url')) {
                $id = $product->id;
                $imageName = $id . '.' . $request->file('img_url')->getClientOriginalExtension();
                $request->file('img_url')->move(public_path('images/product'), $imageName);
                $product->picture = $imageName;
                //return $product->img_url;
                $product->save();
            }
            return redirect()->route('products.index');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al guardar el producto');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        try {
            $product = Product::find($id);
            return view('product.show', compact('product'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al obtener el producto');
        }
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
        try {
            $product = Product::find($id);
            $categories = Category::all();
            $providers = Provider::all();
            return view('product.edit', compact('product', 'categories', 'providers'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al mostrar el formulario');
        }
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
            $product = Product::find($id);
            $product->name = $request->name;
            $product->description = $request->description;
            $product->size = $request->size;
            $product->price = $request->price;
            $product->category_id = $request->category_id;
            $product->provider_id = $request->provider_id;

            if ($request->hasFile('img_url')) {
                if (!empty($product->picture) && file_exists(public_path('images/product/' . $product->picture))) {
                    File::delete(public_path('images/product/' . $product->picture));
                }
                $imageName = $id . '.' . $request->img_url->extension();
                $request->img_url->move(public_path('images/product'), $imageName);
                $product->picture = $imageName;
            }

            $product->save();
            return redirect()->route('products.index');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al actualizar el producto');
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
        try {
            $product = Product::find($id);
            if (!empty($product->picture) && file_exists(public_path('images/product/' . $product->picture))) {
                File::delete(public_path('images/product/' . $product->picture));
            }
            $product->delete();
            return redirect()->route('products.index');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al eliminar el producto');
        }
    }
}