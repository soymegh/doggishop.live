<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\PetType;
use Illuminate\Support\Facades\File;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
   
        try {
            $pets = Pet::all();
            return view('pet.index', compact('pets'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al obtener las mascotas');
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
            $petTypes = PetType::all();
            return view('pet.create', compact('petTypes'));
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
            $pet = new Pet();
            $pet->name = $request->name;
            $pet->breed = $request->breed;
            $pet->gender = $request->gender;
            $pet->age = $request->age;
            $pet->price = $request->price;
            $pet->pet_type_id = $request->pet_type;
            $pet->save();

            if ($request->hasFile('img_url')) {
                $id = $pet->id;
                $imageName = $id . '.' . $request->file('img_url')->getClientOriginalExtension();
                $request->file('img_url')->move(public_path('images/pet'), $imageName);
                $pet->img_url = $imageName;
                $pet->save();
            }

            return redirect()->route('pets.index');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al guardar la mascota');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        try {
            $pet = Pet::find($id);
            return view('pet.show', compact('pet'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al obtener la mascota');
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
            $pet = Pet::find($id);
            $petTypes = PetType::all();
            return view('pet.edit', compact('pet', 'petTypes'));
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
            $pet = Pet::find($id);
            $pet->name = $request->name;
            $pet->breed = $request->breed;
            $pet->gender = $request->gender;
            $pet->age = $request->age;
            $pet->price = $request->price;
            $pet->pet_type_id = $request->pet_type;

            if ($request->hasFile('img_url')) {
                if (!empty($pet->img_url) && file_exists(public_path('images/pet/' . $pet->img_url))) {
                    File::delete(public_path('images/pet/' . $pet->img_url));
                }
                $imageName = $id . '.' . $request->img_url->extension();
                $request->img_url->move(public_path('images/pet'), $imageName);
                $pet->img_url = $imageName;
            }
            $pet->save();


            return redirect()->route('pets.index');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al actualizar la mascota');
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
            $pet = Pet::find($id);
            if (!empty($pet->img_url) && file_exists(public_path('images/pet/' . $pet->img_url))) {
                File::delete(public_path('images/pet/' . $pet->img_url));
            }
            $pet->delete();
            return redirect()->route('pets.index');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al eliminar la mascota');
        }
    }
}