<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Block;
use App\Area;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blocks = Block::all();
        return View('admin.master.block.index', compact('blocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::where('status', 1)->get();
        return View('admin.master.block.create', compact('areas'));
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
            'area_id' => ['required', 'integer'],
            'status' => ['required', 'string'],
        ]);

        $block = new Block();
        $block->name = $request->name;
        $block->area_id = $request->area_id;
        $block->status = $request->status;
        $block->save();

        return redirect()->route('admin.masters.block.index')->with('status', 'Block added successfully!');
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
        $block = Block::find($id);
        $areas = Area::where('status', 1)->get();
        return View('admin.master.block.edit', compact('block', 'areas'));
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
        $block = Block::find($id);

        $request->validate([
            'name' => ['required', 'string'],
            'area_id' => ['required', 'integer'],
            'status' => ['required', 'string'],
        ]);

        $block->name = $request->name;
        $block->area_id = $request->area_id;
        $block->status = $request->status;
        $block->save();

        return redirect()->route('admin.masters.block.index')->with('status', 'Block update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $block = Block::findOrFail($id);
        $block->delete();

        return back()->with('status', 'Block deleted successfully!');
    }
}
