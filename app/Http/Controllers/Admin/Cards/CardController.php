<?php

namespace App\Http\Controllers\Admin\Cards;

use App\CardsHistory;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Exception;
use App\Cards;
use App\User;
use App\Area;
use App\Block;
use App\Status;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{
    /* Common Data Tble */
    public function dataTable(Request $request)
    {
        $now = Carbon::now();
        $next_day = $now->addDays(1);

        $agent_login_id = Auth::user()->id;
        ## Read value
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order') ?? 'desc';

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc

        // Total records
        $totalRecords = Cards::select('count(*) as allcount')->count();

        $rage_dates = explode(' - ', $request->get('datetimes'));
        $start_date = '';
        $end_date = '';
        if (count($rage_dates) == 2) {
            $start_date = Carbon::createFromFormat('d/m/Y', $rage_dates[0])->format('Y-m-d');
            $end_date = Carbon::createFromFormat('d/m/Y', $rage_dates[1])->format('Y-m-d');
        }

        $type = $request->get("type");
        $agent_id = $request->get("agent_id");
        $batch_no = $request->get("batch_no");
        $batch_sr_no = $request->get("batch_sr_no");
        $card_no = $request->get("card_no");
        $customer_name = $request->get("customer_name");
        $cif_number = $request->get("cif_number");
        $civil_id = $request->get("civil_id");
        $mobile_no = $request->get("mobile_no");
        $telephone_no = $request->get("telephone_no");
        $area_id = $request->get("area_id");
        $block_id = $request->get("block_id");
        $driver_id = $request->get("driver_id");
        $delivery_date = $request->get("delivery_date");
        if ($delivery_date) {
            $delivery_date = Carbon::createFromFormat('d/m/Y', $delivery_date)->format('Y-m-d');
        }

        // Fetch records
        $recordQuery = Cards::orderBy($columnName, $columnSortOrder)
            ->leftJoin('users', 'cards.agent_id', '=', 'users.id')
            ->leftJoin('areas', 'cards.area_id', '=', 'areas.id')
            ->leftJoin('blocks', 'cards.block_id', '=', 'blocks.id')
            ->leftJoin('drivers', 'cards.driver_id', '=', 'drivers.id')
            ->leftJoin('statuses', 'cards.status', '=', 'statuses.id');;
        if ($type == 'newly_arrived') {
            $recordQuery->where('cards.agent_id', NULL)->where('cards.status', 0);
        }
        if ($type == 'call_center') {
            $recordQuery->where('cards.status', 0)->where('cards.agent_id', $agent_login_id);
        }
        if ($type == 'out_for_delivery') {
            $recordQuery->where('cards.status', 1)->where('cards.driver_id', NULL);
        }
        if ($type == 'return_to_bank') {
            $recordQuery->where('cards.status', 2);
        }
        if ($type == 'assign_to_agent') {
            $recordQuery->whereNotNull('cards.agent_id')->where('cards.status', 0);
        }
        if ($type == 'assign_to_driver') {
            $recordQuery->where('cards.status', 1)->whereNotNull('cards.driver_id');
        }
        if ($type == 'unassigned') {
            $recordQuery->where('cards.status', '>=', 5);
        }
        if ($type == 'undelivered') {
            $recordQuery->where('cards.status', 4);
        }
        if ($type == 'delivered') {
            $recordQuery->where('cards.status', 3);
        }

        if ($type == 'upcoming_delivery') {
            $recordQuery->where('cards.status', 1)->where('cards.driver_id', NULL)->whereDate('cards.delivery_date', '>=', $next_day);
        }
        if ($agent_id) {
            $recordQuery->whereIn('cards.agent_id', $agent_id);
        }
        if ($area_id) {
            $recordQuery->whereIn('cards.area_id', $area_id);
        }
        if ($block_id) {
            $recordQuery->whereIn('cards.block_id', $block_id);
        }
        if ($driver_id) {
            $recordQuery->whereIn('cards.driver_id', $driver_id);
        }
        if ($start_date && $end_date) {
            if ($type == 'delivered') {
                $recordQuery->whereDate('cards.delivery_date', '>=', $start_date)->whereDate('cards.delivery_date', '<=', $end_date);
            } else {
                $recordQuery->whereDate('cards.created_at', '>=', $start_date)->whereDate('cards.created_at', '<=', $end_date);
            }
        }
        if ($batch_no) {
            $recordQuery->where('cards.batch_no', 'like', '%' . $batch_no . '%');
        }
        if ($batch_sr_no) {
            $recordQuery->where('cards.batch_sr_no', 'like', '%' . $batch_sr_no . '%');
        }
        if ($card_no) {
            $recordQuery->where('cards.card_no', 'like', '%' . $card_no . '%');
        }
        if ($customer_name) {
            $recordQuery->where('cards.customer_name', 'like', '%' . $customer_name . '%');
        }
        if ($cif_number) {
            $recordQuery->where('cards.cif_no', 'like', '%' . $cif_number . '%');
        }
        if ($civil_id) {
            $recordQuery->where('cards.civil_id', 'like', '%' . $civil_id . '%');
        }
        if ($mobile_no) {
            $recordQuery->where('cards.mobile_no', 'like', '%' . $mobile_no . '%');
        }
        if ($telephone_no) {
            $recordQuery->where('cards.telephone_no', 'like', '%' . $telephone_no . '%');
        }
        if ($delivery_date) {
            $recordQuery->whereDate('cards.delivery_date', '=', $delivery_date);
        }
        $totalRecordswithFilter = $recordQuery->select('count(*) as allcount')->count();
        $records = $recordQuery->select('cards.*', 'cards.id as id', 'areas.name as area_name', 'blocks.name as block_name', 'users.first_name as agent_name', 'drivers.driver_name as driver_name', 'statuses.name as status_name')->skip($start)->take($rowperpage)->get();
        $data_arr = array();

        foreach ($records as $record) {
            $delivery_date = '';
            if ($record['delivery_date']) {
                $delivery_date = Carbon::parse($record['delivery_date'])->format('d-m-Y');
            }
            $print_url = route('admin.cards.print', ['id' => $record->id]);
            $url_delete = route('admin.cards.newly-arrived.destroy', $record->id);
            $option = '';

            $url = route('admin.cards.call-logs', ['id' => $record->id]);
            if ($type == 'newly_arrived') {
                $option .= '&nbsp;<a href="' . $url_delete . '" class="btn btn-sm btn-danger" data-confirm="Are you sure to delete this card ?"> Delete </a>';
            } else if ($type == 'call_center') {
                $option .= '<a class="btn btn-sm btn-primary mr-1" onclick="updateCardDetails(' . $record->id . ')">Edit</a>';
                $option .= '<a class="btn btn-sm btn-info mr-1" href="' . $url . '">Call Logs</a>';
            } else {
                $option .= '<a class="btn btn-sm btn-primary mr-1" onclick="updateCardDetails(' . $record->id . ')">Edit</a>';
                $option .= '<a href="' . $print_url . '" class="btn btn-sm btn-success mr-1" target="_blank">Print</a>';
                $option .= '<a class="btn btn-sm btn-info mr-1" href="' . $url . '">Call Logs</a>';
            }
            $address = '';
            if ($record->street) {
                $address .= $record->street;
            }
            if ($record->avenue) {
                $address .= ',<br>' . $record->avenue;
            }
            if ($record->house_no) {
                $address = ',<br>' . $record->house_no;
            }
            if ($record->floor) {
                $address .= ',<br>' . $record->floor;
            }
            if ($record->flat) {
                $address .= ',<br>' . $record->flat;
            }

            $data_arr[] = array(
                "id" => $record->id,
                "batch_no" => $record->batch_no,
                "delivery_date" => $delivery_date,
                "batch_sr_no" => $record->batch_sr_no,
                "card_no" => $record->card_no,
                "agent_name" => $record->agent_name,
                "driver_name" => $record->driver_name,
                "customer_name" => $record->customer_name,
                "cif_no" => $record->cif_no,
                "civil_id" => $record->civil_id,
                "mobile_no" => $record->mobile_no,
                "telephone_no" => $record->telephone_no,
                "area_name" => $record->area_name,
                "block_name" => $record->block_name,
                "remark" => $record->remark,
                "address" => $address,
                "status_name" => $record->status_name,
                "option" => $option
            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        echo json_encode($response);
        exit;
    }

    /* Get Card Details */
    public function getCardDetails(Request $request)
    {
        try {
            $this->validate($request, [
                'card_id' => 'required'
            ]);
            $card_id = $request->card_id;
            $type = $request->type;
            $records = Cards::where('id', $card_id)->first();
            $all_areas = Area::where('status', 1)->get();
            if ($type == 'call_center') {
                $all_status = Status::where('id', '!=', 5)->where('id', '!=', 3)->where('id', '!=', 4)->get();
            } else {
                $all_status = Status::where('id', '!=', 5)->get();
            }

            return view('admin.cards.assign-to-agent.edit', compact('records', 'all_areas', 'all_status', 'type'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /* Get Block */
    public function getBlock(Request $request)
    {
        try {
            $this->validate($request, [
                'area_id' => 'required'
            ]);
            $area_id = $request->input("area_id");
            $query = Block::where('status', 1);
            if (is_array($area_id)) {
                $query = $query->whereIn('area_id', $area_id);
            } else {
                $query = $query->where('area_id', $area_id);
            }
            $get_block = $query->get();
            return $get_block;
        } catch (Exception $exception) {
            return array('status' => 'error', 'msg' => $exception->getMessage());
        }
    }

    /* Save Update Status */
    public function updateCardDetails(Request $request)
    {
        //        dd($request->all());
        $hidden_id = $request->hidden_id;
        $request->validate([
            'status' => ['required', 'integer'],
        ]);
        try {
            $delivery_date = Carbon::createFromFormat('d/m/Y', $request->delivery_date)->format('Y-m-d');

            $old_card = Cards::find($hidden_id);

            $Cards = Cards::find($hidden_id);
            $Cards->area_id = $request->area_id;
            $Cards->block_id = $request->block_id;
            $Cards->street = $request->street;
            $Cards->avenue = $request->avenue;
            $Cards->house_no = $request->house_no;
            $Cards->floor = $request->floor;
            $Cards->flat = $request->flat;
            $Cards->latitude = $request->latitude;
            $Cards->longitude = $request->longitude;
            $Cards->status = $request->status;
            $Cards->remark = $request->remark;
            $Cards->delivery_date = $delivery_date;

            $Cards->batch_no = $request->batch_no;
            $Cards->batch_sr_no = $request->batch_sr_no;
            $Cards->card_no = $request->card_no;
            $Cards->customer_name = $request->customer_name;
            $Cards->cif_no = $request->cif_number;
            $Cards->civil_id = $request->civil_id;
            $Cards->mobile_no = $request->mobile_number;
            $Cards->telephone_no = $request->telephone_number;

            if ($old_card->status == 4 && $Cards->status == 1) {
                $Cards->driver_id = null;
                $Cards->delivery_date = null;
            } else if ($old_card->status >= 5 && $Cards->status == 0) {
                $Cards->agent_id = null;
                $Cards->driver_id = null;
                $Cards->delivery_date = null;
            }

            $Cards->save();

            if ($old_card->status !== $Cards->status || $old_card->agent_id !== $Cards->agent_id || $old_card->driver_id !== $Cards->driver_id) {
                $carHistory = new CardsHistory();
                $carHistory->card_id = $Cards->id;
                $carHistory->status_id = $Cards->status;
                $carHistory->agent_id = $Cards->agent_id;
                $carHistory->driver_id = $Cards->driver_id;
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

            if ($request->status == 1 && $request->type == 'call_center') {
                //                return redirect()->route('admin.cards.print', ['id' => $Cards->id]);
                return redirect()->back()->with('status', 'Card Details Updated Successfully')->with('print_id', $Cards->id);
            } else {
                return redirect()->back()->with('success', 'Card Details Updated Successfully');
            }
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function search(Request $request)
    {
        $card = array();
        if ($request->has('search_key')) {
            $card = Cards::where('card_no', 'LIKE', '%'.$request->search_key.'%')
//                ->whereNotNull('cards.driver_id')
//                ->where('cards.status', '!=', 3)
//                ->where('cards.status', '!=', 4)
                ->leftJoin('drivers', 'cards.driver_id', '=', 'drivers.id')
                ->select('cards.*', 'cards.id as id', 'drivers.driver_name as driver_name')
                ->get();
        }

        return response()->json(array('status' => 'ok', 'message' => 'Data fetched successfully', 'card' => $card));
    }

    public function updateCardStatus(Request $request)
    {
        $request->validate([
            'action' => ['required'],
            'slected_row_id' => ['required'],
            'status' => ['required']
        ]);


        foreach ($request->slected_row_id as $card_id) {
            $old_card = Cards::find($card_id);
            $card = Cards::find($card_id);
            if ($card) {
                $card->status = $request->status;
                if ($old_card->status == 4 && $card->status == 1) {
                    $card->driver_id = null;
                    $card->delivery_date = null;
                } else if ($old_card->status >= 5 && $card->status == 0) {
                    $card->agent_id = null;
                    $card->driver_id = null;
                    $card->delivery_date = null;
                }
                if ($request->has('agent_id')) {
                    $card->agent_id = $request->agent_id;
                }
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

        return redirect()->back()->with('status', 'Status changed successfully!');
    }
}
