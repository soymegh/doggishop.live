<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PetType;
use Illuminate\Support\Facades\File;

class PetTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
     
        
        try{
            $petTypes = PetType::all();
            return view('pet_type.index', compact('petTypes'));
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
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
            return view('pet_type.create');
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
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
        try{
            $petType = new PetType();
            $petType->name = $request->name;
            $petType->description = $request->description;
            $petType->save();

            if ($request->hasFile('img_url')) {
                $id = $petType->id;
                $imageName = $id . '.' . $request->file('img_url')->getClientOriginalExtension();
                $request->file('img_url')->move(public_path('images/pet_type'), $imageName);
                $petType->img_url = $imageName;
                $petType->save();
            }
            return redirect()->route('pet_type.index');
        }catch(\Exception $e){
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
        try{
            $petType = PetType::find($id);
            return view('pet_type.show', compact('petType'));
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
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
            $petType = PetType::find($id);
            return view('pet_type.edit', compact('petType'));
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
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
            $petType = PetType::find($id);
            $petType->name = $request->name;
            $petType->description = $request->description;

            if ($request->hasFile('img_url')) {
                if (!empty($petType->img_url) && file_exists(public_path('images/petType/' . $petType->img_url))) {
                    File::delete(public_path('images/petType/' . $petType->img_url));
         
                }
                $imageName = $id . '.' . $request->img_url->extension();
                $request->img_url->move(public_path('images/pet_type'), $imageName);
                $petType->img_url = $imageName;
            }

            $petType->save();
            return redirect()->route('pet_type.index');
        }catch(\Exception $e){
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
            $petType = PetType::find($id);
            if (!empty($petType->img_url) && file_exists(public_path('images/pet_type/' . $petType->img_url))) {
                File::delete(public_path('images/pet_type/' . $petType->img_url));
            }
            $petType->delete();
            return redirect()->route('pet_type.index');
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}