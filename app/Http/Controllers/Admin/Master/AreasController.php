<?php

namespace App\Http\Controllers\Admin\Master;

use App\Area;
use App\Governorate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AreasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::all();
        return View('admin.master.areas.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $governorates = Governorate::where('status', 1)->get();

        return View('admin.master.areas.create', compact('governorates'));
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
            'governorate_id' => ['required', 'integer'],
            'status' => ['required', 'string'],
        ]);

        $area = new Area();
        $area->name = $request->name;
        $area->governorate_id = $request->governorate_id;
        $area->status = $request->status;
        $area->save();

        return redirect()->route('admin.masters.areas.index')->with('status', 'Area added successfully!');
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
        $areas = Area:: find($id);
        $governorates = Governorate::where('status', 1)->get();
        return View('admin.master.areas.edit', compact('areas', 'governorates'));
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
        $areas = Area:: find($id);

        $request->validate([
            'name' => ['required', 'string'],
            'governorate_id' => ['required', 'integer'],
            'status' => ['required', 'string'],
        ]);

        $areas->name = $request->name;
        $areas->governorate_id = $request->governorate_id;
        $areas->status = $request->status;
        $areas->save();

        return redirect()->route('admin.masters.areas.index')->with('status', 'Area update successfully!');
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param \App\Package $package
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request, $id)
    {
        Area::withTrashed()->whereId($id)->restore();
        return back()->with('status', 'Area restored successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $area = Area::findOrFail($id);
        $area->delete();

        return back()->with('status', 'Area deleted successfully!');
    }
}
