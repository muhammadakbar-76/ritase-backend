<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('units.index', [
            'title' => 'Units',
            'units' => Unit::paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('units.create', [
            'title' => 'Create Unit'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unit = Unit::where('name', $request->name)->get();
        // dd($unit);
        if (count($unit) > 0) {
            return Redirect::back()->withErrors(['errors' => 'name already exist']);
        }

        $validatedData = $request->validate([
            'name' => 'required|max:20',
            'operator' => 'required|max:50'
        ]);

        Unit::create($validatedData);

        return redirect()->route('units.index')->with('success', 'Unit Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        return view('units.edit', [
            'title' => 'Edit Unit',
            'unit' => $unit,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        $unit1 = Unit::where('name', $request->name)->get();
        // dd($unit);
        if (count($unit1) > 0 && $unit->name !== $request->name) {
            return Redirect::back()->withErrors(['errors' => 'name already exist']);
        }

        $validatedData = $request->validate([
            'name' => 'required|max:20',
            'operator' => 'required|max:50'
        ]);

        Unit::where('unit_kode', $unit->unit_kode)
            ->update($validatedData);

        return redirect()->route('units.index')->with('success', 'Unit Successfully Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Int $unit)
    {
        $isDeleted = Unit::where('unit_kode', $unit)->delete();

        if (!$isDeleted) {
            return Redirect::back()->withErrors(['errors' => "Data doesn't exist"]);
        }

        return redirect()->route('units.index')->with('success', 'Unit Successfully Deleted');
    }
}
