<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if($request){
            $users = User::whereAny(['name','email'],'LIKE','%'.$request->get('search').'%')->paginate(8);
        }
        else{
            $users = User::paginate(8);
        }

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('user..create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try{
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role= $request->role;
        $user->save();
        return redirect()->route('admin.index')->with('success', 'Se ha ingresado el usuario correctamente');
        }catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al ingresar el nuevo usuario');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $user = User::find($id);
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = User::find($id);
        return view('user.edit', compact('user'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try{
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role= $request->role; 
        $user->save();
        return redirect()->route('admin.index')->with('success', 'Se ha actualizado el usuario correctamente');
        }catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al actualizar el usuario');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try{
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.index')->with('success', 'Se ha eliminado el usuario correctamente');
        }catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al eliminar el usuario');
        }
        
    }
}