<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Cards;
use App\Driver;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $newly_arrive_cnt = Cards::where('cards.agent_id', NULL)->count();
        $deliverd_cnt = Cards::where('status', 3)->count();
        $cll_center_cnt = User::where('type', 2)->where('status', 1)->count();
        $driver_cnt = Driver::where('status', 1)->count();
        return view('admin.home.index', compact('newly_arrive_cnt', 'deliverd_cnt', 'cll_center_cnt', 'driver_cnt'));
    }

    public function reset_date(Request $request)
    {
        $carts = Cards::where('delivery_date', '<=', now()->format('Y-m-d'))->whereStatus(1)->where('cards.driver_id', NULL)->orderBy('id','asc')->get();
        $date = Carbon::now()->addDays(1)->format('Y-m-d');
        if (!empty($carts)) {
            foreach ($carts as $c) {
                    $c->delivery_date = $date;
                    $c->save();
            }
        }
        $msg = 'Date updated successfully';
        return response()->json(['status' => 'success', 'msg' => $msg]);
    }
}
