<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Inventary;
use App\Models\Provider;
use App\Models\PetType;
use Illuminate\Support\Facades\File;
use App\Services\DiscountService;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $discountServices = new DiscountService();

        try {
            $products = $discountServices->applyDiscountProducts($request);
            

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
            $pet_types = PetType::all();
            return view('product.create', compact('categories', 'providers', 'pet_types'));
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
            $product->stock = $request->stock;
            $product->pet_type_id = $request->pet_type_id;
            $product->category_id = $request->category_id;
            $product->provider_id = $request->provider_id;
            $product->save();
            $this->saveInv($product);

            if ($request->hasFile('img_url')) {
                $id = $product->id;
                $imageName = $id . '.' . $request->file('img_url')->getClientOriginalExtension();
                $request->file('img_url')->move(public_path('images/product'), $imageName);
                $product->picture = $imageName;
                //return $product->img_url;
                $product->save();
            }

            return redirect()->route('products.index')->with('success', 'Producto guardado correctamente');
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
            $pet_types = PetType::all();
            $categories = Category::all();
            $providers = Provider::all();
            return view('product.edit', compact('product', 'categories', 'providers', 'pet_types'));
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
            
            $product->pet_type_id = $request->pet_type_id;
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

            //ver cuantos movimientos en el inventario
            $inventaryCount = Inventary::where('product_id', $product->id)->count();
            
            if($inventaryCount == 0){
                $product->stock = $request->stock;
                $product->save();
                $this->saveInv($product);
                return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente');
            }elseif ($inventaryCount == 1) {
                $product->stock = $request->stock;
                $product->save();
                //cambiar la inventario inicial del inventario
                $inventary = Inventary::where('product_id', $product->id)->first();
                $inventary->quantity = $product->stock;
                $inventary->price = $product->price;
                $inventary->save();
                return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente');
            }else{
                return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente, pero no se cambio el stock porque ya tiene movimientos en el inventario');
            }
            
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

    public function saveInv($product)
    {
        $inventary = new Inventary();
        $inventary->date = date('Y-m-d');
        $inventary->product_id = $product->id;
        $inventary->quantity = $product->stock;
        $inventary->price = $product->price;
        $inventary->description = 'Entrada';
        $inventary->user_id = auth()->id();
        $inventary->save();
    }
}