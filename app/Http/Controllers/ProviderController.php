<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider;
use Illuminate\Support\Facades\File;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
   
        try{
            $providers = Provider::paginate(8);
            return view('provider.index', compact('providers'));
        }catch(\Exception $ex){
            return redirect()->back()->with('error', 'Error al obtener Proveedores');
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
        try{
            return view('provider.create');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Error al mostrar formulario');
        }
    }

    /**
     * Store4 a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if (auth()->user()->role != 'admin') {
            return redirect()->route('welcome');
        }
        try{
            //return $request;
            $provider = new Provider();
            $provider->name = $request->name;
            $provider->attendant = $request->attendant;
            $provider->email = $request->email;
            $provider->phone = $request->phone;
            $provider->website = $provider->website;
            $provider->save();
        
            if ($request->hasFile('img_url')) {
                $id = $provider->id;
                $imageName = $id . '.' . $request->file('img_url')->getClientOriginalExtension();
                $request->file('img_url')->move(public_path('images/provider'), $imageName);
                $provider->img_url = $imageName;
                $provider->save();
            }

            return redirect()->route('providers.index');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Error al guardar el proveedor');
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
        try{
            $provider = Provider::find($id);
            return view('provider.show', compact('provider'));
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Error al obtener el Proveedor');
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
        try{
        
            $provider = Provider::find($id);
            return view('provider.edit', compact('provider'));
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Error al obtener el Proveedor');
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
        try{
            $provider = Provider::find($id);
            $provider->name = $request->name;
            $provider->attendant = $request->attendant;
            $provider->email = $request->email;
            $provider->phone = $request->phone;
            $provider->website = $request->website;

            if ($request->hasFile('img_url')) {
                if (!empty($provider->img_url) && file_exists(public_path('images/providers/' . $provider->img_url))) {
                    File::delete(public_path('images/provider/' . $provider->img_url));
                }
                $imageName = $id . '.' . $request->img_url->extension();
                $request->img_url->move(public_path('images/provider'), $imageName);
                $provider->img_url = $imageName;
            }
            
            $provider->save();
            return redirect()->route('providers.index')->with('success', 'Proveedor actualizado correctamente');
        }catch(\Exception $e){
            
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
            $provider = Provider::find($id);

            if (!empty($provider->img_url) && file_exists(public_path('images/provider/' . $provider->img_url))) {
                File::delete(public_path('images/provider/' . $provider->img_url));
            }

            $provider->delete();
            return redirect()->route('providers.index')->with('success', 'Proveedor eliminado correctamente');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Error al eliminar el proveedor.');
        }
    }
}