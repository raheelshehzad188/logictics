<?php

namespace App\Http\Controllers\Admin\Cards;

use App\CardsHistory;
use App\Http\Controllers\Controller;
use App\Status;
use Illuminate\Http\Request;
use App\Driver;
use App\Cards;
use App\User;
use App\Area;
use Illuminate\Support\Facades\Auth;

class OutForDeliveryController extends Controller
{
    public function index()
    {
        $all_drivers = Driver::where('status', 1)->get();
        $all_areas = Area::where('status', 1)->get();
        $all_status = Status::where('id', '!=', 5)->get();

        foreach ($all_areas as $key => $all_area) {
            $count = Cards::where('area_id', $all_area->id)->where('status', 1)->where('driver_id', NULL)->count();
            $all_areas[$key]->order_count = $count;
            if ($count == 0) {
                unset($all_areas[$key]);
            }
        }

        $all_call_centers = User::where('status', 1)->where('type', 2)->get();
        return View('admin.cards.out-for-delivery.index', compact('all_drivers', 'all_call_centers', 'all_areas', 'all_status'));
    }

    public function assignDriver(Request $request)
    {
        $request->validate([
            'driver_id' => ['required', 'integer'],
            'slected_row_id' => ['required']
        ]);
        $driver_id = $request->driver_id;
        $all_row_id = $request->slected_row_id;
        foreach ($all_row_id as $row_id) {
            $card = Cards::find($row_id);
            if ($card) {
                $card->driver_id = $driver_id;
                $card->save();

                $carHistory = new CardsHistory();
                $carHistory->card_id = $card->id;
                $carHistory->status_id = $card->status;
                $carHistory->agent_id = $card->agent_id;
                $carHistory->driver_id = $card->driver_id;
                $carHistory->updated_by = Auth::user()->id;
                if ($carHistory->status_id == 0 && !$carHistory->agent_id) {
                    $carHistory->remark = 'The status of the card is changed to Newly Arrived';
                } else if ($carHistory->status_id == 0 && $carHistory->agent_id) {
                    $carHistory->remark = 'The status of the card is changed to Assigned to Agent';
                } else if ($carHistory->status_id == 1 && !$carHistory->driver_id) {
                    $carHistory->remark = 'The status of the card is changed to Out for Delivery';
                } else if ($carHistory->status_id == 1 && $carHistory->driver_id) {
                    $carHistory->remark = 'The status of the card is changed to Assigned to Driver';
                } else if ($carHistory->status_id == 2) {
                    $carHistory->remark = 'The status of the card is changed to Return to Bank';
                } else if ($carHistory->status_id == 3) {
                    $carHistory->remark = 'The status of the card is changed to Delivered';
                } else {
                    $carHistory->remark = 'The status of the card is changed to Other';
                }
                $carHistory->save();
            }
        }
        return redirect()->route('admin.cards.out-for-delivery.index')->with('status', 'Driver assign successfully!');
    }
}
