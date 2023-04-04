<?php

namespace App\Http\Controllers\Admin;

use App\CallCenter;
use App\Cards;
use App\CardsHistory;
use App\Driver;
use App\Http\Controllers\Controller;
use App\Status;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarcodeController extends Controller
{
    public function index()
    {
        $all_status = Status::where('id', '!=', 5)->get();
        $agents = CallCenter::where('status',1)->get();
        $drivers = Driver::where('status',1)->get();
        return View('admin.barcode.index',compact('all_status','agents','drivers'));
    }
    public function change_status(Request $request)
    {
        if (!empty($request->numbers)){
            foreach ($request->numbers as $number) {
                $old_card = Cards::find($number);
                $card = Cards::find($number);
                if (!empty($card)) {
                    if ($request->status == 00 || $request->status == 0) {
                        $status = 0;
                    } elseif ($request->status == 11 || $request->status == 1) {
                        $status = 1;
                    } elseif ($request->status == 4) {
                        $status = 4;
                    } elseif ($request->status == 2) {
                        $status = 2;
                    } elseif ($request->status == 3) {
                        $status = 3;
                    } else {
                        $status = $request->status;
                    }
                    $card->status = $status;
                    $card->driver_id = $request->driver_id;
                    $card->agent_id = $request->agent_id;
                    $card->save();

                    if ($old_card->status !== $card->status || $old_card->agent_id !== $card->agent_id || $old_card->driver_id !== $card->driver_id) {
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
            }
        }
        $msg = 'Status updated successfully';
        return response()->json(['status' => 'success', 'msg' => $msg]);
    }
}

