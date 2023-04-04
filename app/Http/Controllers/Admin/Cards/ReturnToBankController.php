<?php

namespace App\Http\Controllers\Admin\Cards;

use App\Cards;
use App\Http\Controllers\Controller;
use App\Status;
use Illuminate\Http\Request;
use App\User;
use App\Area;

class ReturnToBankController extends Controller
{
    public function index()
    {
        $all_call_centers = User::where('status', 1)->where('type', 2)->get();
        $all_areas = Area::where('status', 1)->get();

        foreach ($all_areas as $key => $all_area) {
            $count = Cards::where('area_id', $all_area->id)->where('cards.status', 2)->count();
            $all_areas[$key]->order_count = $count;
            if ($count == 0) {
                unset($all_areas[$key]);
            }
        }
        $all_status = Status::where('id', '!=', 5)->get();

        return View('admin.cards.return-to-bank.index', compact('all_call_centers', 'all_areas', 'all_status'));
    }
}
