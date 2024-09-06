<?php

namespace App\Http\Controllers;

use App\Models\payment_type;
use Illuminate\Http\Request;

class PaymentTypeController extends Controller
{
    public function index(){
        try{
            $paymentTypes = payment_type::paginate(8);
            return view('payment_type.index', compact('paymentTypes'));
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
        
    }

    public function create()
    {
        //
        if (auth()->user()->role != 'admin') {
            return redirect()->route('welcome');
        }

        try{
            return view('payment_type.create');
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        //
        if (auth()->user()->role != 'admin') {
            return redirect()->route('welcome');
        }
        try{
            $payment_type = new payment_type();
            $payment_type->name = $request->name;
            $payment_type->description = $request->description;

            $payment_type->save();
            return redirect()->route('payment_type.index');
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit(string $id)
    {
        //
        if (auth()->user()->role != 'admin') {
            return redirect()->route('welcome');
        }
        try{
            $payment_type = payment_type::find($id);
            return view('payment_type.edit', compact('payment_type'));
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    
    public function update(Request $request, string $id)
    {
        //
        if (auth()->user()->role != 'admin') {
            return redirect()->route('welcome');
        }
        try{
            $payment_type = payment_type::find($id);
            $payment_type->name = $request->name;
            $payment_type->description = $request->description;
            
            $payment_type->save();
            return redirect()->route('payment_type.index');
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        //
        if (auth()->user()->role != 'admin') {
            return redirect()->route('welcome');
        }
        try{
            $payment_type = payment_type::find($id);
            $payment_type->delete();

            return redirect()->route('payment_type.index');
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
