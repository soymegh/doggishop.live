<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\PetType;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if (auth()->user()->role != 'admin') {
            return redirect()->route('welcome');
        }

        if($request){
            $events = Event::whereAny(['name','description','start_date'],'LIKE','%'.$request->get('search').'%')->paginate(8);
        }
        else{
            $events = Event::paginate(8);
        }
        
        return view('event.index', compact('events'));
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
            $petTypes = PetType::all();

            return view('event.create',compact('petTypes'));
        }catch (\Exception $e) {
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
        $event = new Event();
        $event->name = $request->name;
        $event->description = $request->description;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->pet_type_id = $request->pet_type;
        $event->save();

        if ($request->hasFile('image_event')) {
            $id = $event->id;
            $imageName = $id . ".". $request->image_event->extension();
            $request->file('image_event')->move(public_path('images/event'), $imageName);
            $event->image_event = $imageName;
            $event->save();
        }

        return redirect()->route('events.index')->with('success', 'Evento creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        try {
            $event = Event::find($id);
            return view('event.show', compact('event'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al mostrar el evento');
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
            $event = Event::find($id);
            $petTypes = PetType::all();
            return view('event.edit', compact('event','petTypes'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al mostrar el evento');
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
            $event = Event::find($id);
            $event->name = $request->name;
            $event->description = $request->description;
            $event->start_date = $request->start_date;
            $event->end_date = $request->end_date;
            $event->pet_type_id = $request->pet_type;
            $event->save();

            if ($request->hasFile('image_event')) {
                if (!empty($event->image_event && file_exists(public_path() . '/images/event/' . $event->image_event))) {
                    File::delete(public_path() . '/images/event/' . $event->image_event);
                }
                $imageName = $id . '.' . $request->image_event->extension();
                $request->image_event->move(public_path('images/event'), $imageName);
                $event->image_event = $imageName;
                $event->save();
            }
            $event->save();

            return redirect()->route('events.index')->with('success', 'Evento actualizado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al actualizar el evento');
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
            $event = Event::find($id);
            if (!empty($event->image_event && file_exists(public_path() . '/images/event/' . $event->image_event))) {
                File::delete(public_path() . '/images/event/' . $event->image_event);
            }
            $event->delete();
            return redirect()->route('events.index')->with('success', 'Evento eliminado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al eliminar el evento');
        }
    }
}
