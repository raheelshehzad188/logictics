<?php

namespace App\Http\Controllers\Admin\Cards;

use App\CardsHistory;
use App\Http\Controllers\Controller;
use App\Status;
use Illuminate\Http\Request;
use App\Cards;
use App\Area;
use App\Driver;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AssignToDriverController extends Controller
{
    public function index()
    {
        $all_drivers = Driver::where('status', 1)->get();
        $all_areas = Area::where('status', 1)->get();
        $all_status = Status::where('id', '!=', 5)->get();

        foreach ($all_areas as $key => $all_area) {
            $count = Cards::where('area_id', $all_area->id)->whereNotNull('cards.driver_id')->where('cards.status', '!=', 3)->where('cards.status', '!=', 4)->count();
            $all_areas[$key]->order_count = $count;
            if ($count == 0) {
                unset($all_areas[$key]);
            }
        }

        return View('admin.cards.assign-to-driver.index', compact('all_drivers', 'all_areas', 'all_status', 'count'));
    }

    public function markAsDelivered(Request $request)
    {
        $request->validate([
            'slected_row_id' => ['required']
        ]);
        $all_row_id = $request->slected_row_id;
        foreach ($all_row_id as $row_id) {
            $card = Cards::find($row_id);
            if ($card) {
                $card->status = '3';
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
        return redirect()->route('admin.cards.assign-to-driver.index')->with('status', 'Mark as delivered successfully!');
    }

    public function printManifest(Request $request)
    {
        $request->validate([
            'slected_row_id' => ['required']
        ]);
        $all_row_id = $request->slected_row_id;
        $order_type = $request->order_type;
        $records = Cards::whereIn('cards.id', $all_row_id)
            ->leftJoin('users', 'cards.agent_id', '=', 'users.id')
            ->leftJoin('areas', 'cards.area_id', '=', 'areas.id')
            ->leftJoin('blocks', 'cards.block_id', '=', 'blocks.id')
            ->leftJoin('drivers', 'cards.driver_id', '=', 'drivers.id');
        if (!empty($order_type)) {
            $records = $records->orderBy('customer_name', $order_type);
        }
        $records = $records->select('cards.*', 'cards.id as id', 'areas.name as area_name', 'blocks.name as block_name')
            ->get();
        $date = null;
        if (!empty($records)) {
            $date = Carbon::parse($records[0]['delivery_date'])->format('d-m-Y');
        }
        $driver_record = Cards::with('driver_details')->whereIn('id', $all_row_id)->first();
        $driver_name = '';
        if ($driver_record) {
            $driver_name = $driver_record->driver_details->driver_name ?? '';
        }
        $today = Date('d-m-Y');
        return View('admin.cards.assign-to-driver.print_manifest', compact('records', 'today', 'driver_name', 'date'));
    }
}
