<?php

namespace App\Http\Controllers\Admin\Master;

use App\Governorate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $governorates = Governorate::all();

        return View('admin.master.governorate.index', compact('governorates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.master.governorate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'status' => ['required', 'string'],
        ]);

        $governorate = new Governorate();
        $governorate->name = $request->name;
        $governorate->status = $request->status;
        $governorate->save();

        return redirect()->route('admin.masters.governorates.index')->with('status', 'Governorates added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $governorates = Governorate:: find($id);
        return View('admin.master.governorate.edit', compact('governorates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $governorate = Governorate:: find($id);

        $request->validate([
            'name' => ['required', 'string'],
            'status' => ['required', 'string'],
        ]);

        $governorate->name = $request->name;
        $governorate->status = $request->status;
        $governorate->save();

        return redirect()->route('admin.masters.governorates.index')->with('status', 'Governorates update successfully!');
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param \App\Package $package
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request, $id)
    {
        Governorate::withTrashed()->whereId($id)->restore();
        return back()->with('status', 'Governorate restored successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $governorate = Governorate::findOrFail($id);
        $governorate->delete();

        return back()->with('status', 'Governorate deleted successfully!');
    }
}
