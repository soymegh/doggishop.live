<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discount;
use App\Services\DiscountService;
use App\Services\DiscountValService;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if(auth()->user()->role != 'admin') {
            return redirect()->route('welcome');
        }
        $discounts = Discount::all();
        return view('discount.index', compact('discounts'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if(auth()->user()->role != 'admin') {
            return redirect()->route('welcome');
        }
        return view('discount.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if(auth()->user()->role != 'admin') {
            return redirect()->route('welcome');
        }
        $discount = new Discount();
        $discount->name = $request->name;
        $discount->description = $request->description;
        $discount->discount = $request->discount;
        $discount->pets = $request->pets;
        $discount->products = $request->products;
        //inicia a las 00:00:00
        $discount->start_time = $request->start_time . ' 00:00:00';
        //finaliza a las 23:59:59
        $discount->end_time = $request->end_time . ' 23:59:59';
        
        //si start_time es mayor que end_time no se guarda
        if($discount->start_time > $discount->end_time) {
            return redirect()->back()->with('error', 'La fecha de inicio no puede ser mayor que la fecha de fin');
        }

        $validarFecha = new DiscountValService();
        
        $resp =  $validarFecha->validateDates($discount->start_time, $discount->end_time);
       
        if($resp) {
            return redirect()->back()->with('error', 'Ya existe un descuento en ese rango de fechas');
        }
    
        $discount->save();
        return redirect()->route('discounts.index')->with('success', 'Descuento creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $discount = Discount::find($id);
        return view('discount.show', compact('discount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        if(auth()->user()->role != 'admin') {
            return redirect()->route('welcome');
        }
        $discount = Discount::find($id);
        return view('discount.edit', compact('discount'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if(auth()->user()->role != 'admin') {
            return redirect()->route('welcome');
        }
        $discount = Discount::find($id);
        $discount->name = $request->name;
        $discount->description = $request->description;
        $discount->discount = $request->discount;
        $discount->pets = $request->pets;
        $discount->products = $request->products;
        $discount->start_time = $request->start_time . ' 00:00:00';
        $discount->end_time = $request->end_time . ' 23:59:59';
        $discount->status = $request->status;
        //si start_time es mayor que end_time no se guarda
        if($discount->start_time > $discount->end_time) {
            return redirect()->back()->with('error', 'La fecha de inicio no puede ser mayor que la fecha de fin');
        }

        $validarFecha = new DiscountValService;
        $result = $validarFecha->validateDate($discount->start_time, $discount->end_time, $id);
        
        if($result) {
            return redirect()->back()->with('error', 'Ya existe un descuento en ese rango de fechas');
        }

        $discount->save();
        return redirect()->route('discounts.index')->with('success', 'Descuento actualizado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        if(auth()->user()->role != 'admin') {
            return redirect()->route('welcome');
        }
        $discount = Discount::find($id);
        $discount->delete();
        return redirect()->route('discounts.index')->with('success', 'Descuento eliminado correctamente');

    }
}
