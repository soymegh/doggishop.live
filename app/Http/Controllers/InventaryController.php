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
        if (auth()->user()->role != 'guest') {

            $products = Product::all();
            return view('inventary.create', compact('products'));
        } else {
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


        $cart = session()->get('cart');

        $product = Product::Where('id', $request->product_id)->first();

        if (!$cart) {
            $cart = [
                $request->product_id => [
                    "date" => date('Y-m-d'),
                    "product" => $product,
                    "quantity" => $request->quantity,
                    "user_id" => auth()->id(),

                ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Registro guardado correctamente');
        }

        if (isset($cart[$request->product_id])) {
            $cart[$request->product_id]['quantity'] += $request->quantity;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Registro guardado correctamente');
        }


        $cart[$request->product_id] = [
            "date" => date('Y-m-d'),
            "product" => $product,
            "quantity" => $request->quantity,
            "user_id" => auth()->id(),
        ];


        session()->put('cart', $cart);

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
        return view('inventary.show', compact('products', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (auth()->user()->role != 'admin') {
            return redirect()->route('welcome');
        }
        try {
            $products = Product::all();
            $item = Product::find($id);
            return view('inventary.edit', compact('item', 'products'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $product = new Inventary();
        $product->date = date("Y-m-d");
        $product->product_id = $request->product_id;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->user_id = auth()->id();
        $product->save();
        return redirect()->route('inventary.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $cart = session()->get('cart');

        if ($id && isset($cart)) {

            if (isset($cart[$id])) {

                unset($cart[$id]);
                //Aqui reparacion del redireccionamiento y error de carrito
                if(count($cart)==0){
                    session()->put('cart',null);
                }else{
                    session()->put('cart', $cart);
                }
                
            }

            return redirect()->back()->with('success', 'Se ha eliminado de su carrito');
        } elseif($id) {
            $product = Inventary::find($id);
            $product->delete();
            return redirect()->back()->with('success', 'Se ha eliminado de su carrito');
        }

        return redirect()->back()->with('success', 'Producto eliminado correctamente');
    }
}
