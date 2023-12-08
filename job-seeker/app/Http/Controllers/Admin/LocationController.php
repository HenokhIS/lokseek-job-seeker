<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Http\Requests\Admin\LocationRequest;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::get();

        return view('admin.locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.locations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationRequest $request)
    {
        Location::create($request->validated());

        return redirect()->route('adminlocations.index')->with([
            'message' => 'successfully created!',
            'alert' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        return view('admin.locations.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LocationRequest $request, Location $location)
    {
        $location->update($request->validated());

        return redirect()->route('adminlocations.index')->with([
            'message' =>'successfully updated!',
            'alert' =>'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $location->delete();

        return redirect()->back()->with([
            'message' => 'Successfully deleted!',
            'alert' => 'danger'
        ]);
    }
}
