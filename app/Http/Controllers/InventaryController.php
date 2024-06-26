<?php

namespace App\Http\Controllers;

use App\Models\Inventary;
use App\Models\Product;
use Illuminate\Http\Request;

class InventaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //veficar si el usuario es admin
        if (auth()->user()->role == 'admin') {
            $products = Inventary::all()->sortByDesc('product_id');
            return view('inventary.index', compact('products'));
        } else {
            $products = Inventary::where('user_id', auth()->id())->get();
            return view('inventary.index', compact('products'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if(auth()->user()->role != 'guest'){
            
        $products = Product::all();
        return view('inventary.create', compact('products'));
        }else{
            return redirect()->route('welcome');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Calcular inventario
        $entradas = Inventary::where('product_id', $request->product_id)->where('description', 'Entrada')->sum('quantity');
        $salidas = Inventary::where('product_id', $request->product_id)->where('description', 'Salida')->sum('quantity');
        $stock = $entradas - $salidas;
        //validar si hay stock
        if ($request->description == 'Salida' && $request->quantity > $stock) {
            return redirect()->back()->with('error', 'No hay stock suficiente');
        }
        $inventary = new Inventary();
        $inventary->date = date('Y-m-d');
        $inventary->product_id = $request->product_id;
        $inventary->quantity = $request->quantity;
        $inventary->price = $request->price;
        $inventary->description = $request->description;
        $inventary->user_id = auth()->id();
        $inventary->save();
        
        //mandar un mensaje de confirmacion
        return redirect()->back()->with('success', 'Registro guardado correctamente');
        
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $products = Inventary::where('product_id', $id)->get();
        return view('inventary.show', compact('products'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $product = Inventary::find($id);
        return view('inventary.edit', compact('product'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $product = Inventary::find($id);
        $product->date = $request->date;
        $product->product_id = $request->product_id;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->user_id = auth()->id();
        $product->save();
        return redirect()->route('inventary.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product = Inventary::find($id);
        $product->delete();
        return redirect()->route('inventary.index');
    }
}