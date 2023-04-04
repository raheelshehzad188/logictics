<?php

namespace App\Http\Controllers\Admin\Cards;

use App\Cards;
use App\Http\Controllers\Controller;
use App\Status;
use Illuminate\Http\Request;
use App\Driver;
use App\Area;

class UndeliveredController extends Controller
{
    public function index()
    {
        $all_drivers = Driver::where('status', 1)->get();
        $all_areas = Area::where('status', 1)->get();

        foreach ($all_areas as $key => $all_area) {
            $count = Cards::where('area_id', $all_area->id)->where('cards.status', 4)->count();
            $all_areas[$key]->order_count = $count;
            if ($count == 0) {
                unset($all_areas[$key]);
            }
        }

        $all_status = Status::where('id', '!=', 5)->get();

        return View('admin.cards.undelivered.index', compact('all_drivers', 'all_areas', 'all_status'));
    }
}
