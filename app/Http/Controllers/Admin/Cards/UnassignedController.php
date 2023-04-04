<?php

namespace App\Http\Controllers\Admin\Cards;

use App\Cards;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Area;
use App\Status;

class UnassignedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_call_centers = User::where('status', 1)->where('type', 2)->get();
        $all_areas = Area::where('status', 1)->get();

        foreach ($all_areas as $key => $all_area) {
            $count = Cards::where('area_id', $all_area->id)->where('status', '>=', 5)->count();
            $all_areas[$key]->order_count = $count;
            if ($count == 0) {
                unset($all_areas[$key]);
            }
        }

        $all_status = Status::where('parent_id', 5)->get();
        return View('admin.cards.unassigned.index', compact('all_call_centers', 'all_areas', 'all_status'));
    }
}
