<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Technology;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();
        return view('technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();//prendo tutti i dati dalla request

        $newTechnology = new Technology();//creo un nuovo oggetto di tipo Technology

        //assegno i valori ai campi dell'oggetto
        $newTechnology->name = $data['name'];
        $newTechnology->color = $data['color'];

        //salvo l'oggetto nel database
        $newTechnology->save();

        return redirect()->route('technologies.show', $newTechnology);
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        return view('technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Technology $technology)
    {
        $data = $request->all();

        $technology->name = $data['name'];
        $technology->color = $data['color'];

        $technology->update();

        return redirect()->route('technologies.show', $technology);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->projects()->detach();
        $technology->delete();

        return redirect()->route('technologies.index');
    }
}
