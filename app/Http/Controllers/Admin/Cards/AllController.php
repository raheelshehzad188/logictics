<?php

namespace App\Http\Controllers\Admin\Cards;

use App\Area;
use App\Cards;
use App\Driver;
use App\Http\Controllers\Controller;
use App\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AllController extends Controller
{
    public function index()
    {
        $out_for_delivery_cnt = Cards::where('status', 1)->count();
        $return_to_bank_cnt = Cards::where('status', 2)->count();
        $deliverd_cnt = Cards::where('status', 3)->count();
        $total_cards_count = Cards::count();
        $total_cards_with_gnp_count = Cards::where('status', '!=', 2)->where('status', '!=', 3)->count();
        $total_processed_card_count = Cards::where('status', 2)->orWhere('status', 3)->count();

        $data = (object)array(
            'out_for_delivery_cnt' => $out_for_delivery_cnt,
            'deliverd_cnt' => $deliverd_cnt,
            'return_to_bank_cnt' => $return_to_bank_cnt,
            'total_cards_count' => $total_cards_count,
            'total_cards_with_gnp_count' => $total_cards_with_gnp_count,
            'total_processed_card_count' => $total_processed_card_count,
        );
        return View('admin.cards.all.index', compact('data'));
    }

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

        $rage_dates1 = explode(' - ', $request->get('datetimes1'));
        $start_date1 = '';
        $end_date1 = '';
        if (count($rage_dates1) == 2) {
            $start_date1 = Carbon::createFromFormat('d/m/Y', $rage_dates1[0])->format('Y-m-d');
            $end_date1 = Carbon::createFromFormat('d/m/Y', $rage_dates1[1])->format('Y-m-d');
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
        $status = $request->get("status");
        if ($delivery_date) {
            $delivery_date = Carbon::createFromFormat('d/m/Y', $delivery_date)->format('Y-m-d');
        }

        // Fetch records
        $recordQuery = Cards::with('history', 'callLogs')->orderBy($columnName, $columnSortOrder)
            ->leftJoin('users', 'cards.agent_id', '=', 'users.id')
            ->leftJoin('areas', 'cards.area_id', '=', 'areas.id')
            ->leftJoin('blocks', 'cards.block_id', '=', 'blocks.id')
            ->leftJoin('drivers', 'cards.driver_id', '=', 'drivers.id')
            ->leftJoin('statuses', 'cards.status', '=', 'statuses.id');

        if ($agent_id) {
            $recordQuery->where('cards.agent_id', $agent_id);
        }
        if ($area_id) {
            $recordQuery->where('cards.area_id', $area_id);
        }
        if ($block_id) {
            $recordQuery->where('cards.block_id', $block_id);
        }
        if ($driver_id) {
            $recordQuery->where('cards.driver_id', $driver_id);
        }
        if ($start_date && $end_date) {
            $recordQuery->whereDate('cards.created_at', '>=', $start_date)->whereDate('cards.created_at', '<=', $end_date);
        }
        if ($start_date1 && $end_date1) {
            $recordQuery->whereDate('cards.delivery_date', '>=', $start_date1)->whereDate('cards.delivery_date', '<=', $end_date1);
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
        if ($status) {
            $recordQuery->where('cards.status', '=', $status);
        }
        $totalRecordswithFilter = $recordQuery->select('count(*) as allcount')->count();
        $records = $recordQuery->select('cards.*', 'cards.id as id', 'areas.name as area_name', 'blocks.name as block_name', 'users.first_name as agent_name', 'drivers.driver_name as driver_name', 'statuses.name as status_name')->skip($start)->take($rowperpage)->get();
        $data_arr = array();

        foreach ($records as $record) {
            $created_at = Carbon::parse($record['created_at'])->format('d-m-Y');
            $delivery_date = '';
            if ($record['delivery_date']) {
                $delivery_date = Carbon::parse($record['delivery_date'])->format('d-m-Y');
            }
            $print_url = route('admin.cards.print', ['id' => $record->id]);
            $url_delete = route('admin.cards.newly-arrived.destroy', $record->id);
            $option = '';

            $url = route('admin.cards.history', ['id' => $record->id]);
            $option .= '&nbsp;<a href="' . $url . '" class="btn btn-sm btn-info"> History </a>';

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

            if ($record->status == 0) {
                $status_name = 'Newly Arrived';
            } else if ($record->status == 1) {
                $status_name = 'Out for Delivery';
            } else if ($record->status == 2) {
                $status_name = 'Return to Bank';
            } else if ($record->status == 3) {
                $status_name = 'Delivered';
            } else {
                $status_name = 'Other';
            }

            $history_string = "";
            foreach ($record->history as $history) {
                $history_string = $history_string . ' ' . $history->status_name . ':' . $history->created_at->format('d M Y H:i a') . ', ';
            }

            $data_arr[] = array(
                "id" => $record->id,
                "batch_no" => $record->batch_no,
                "created_at" => $created_at,
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
                "status_name" => $status_name,
                "option" => $option,
                "history" => $history_string
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

    public function history(Request $request)
    {
        $card = Cards::with('history', 'callLogs', 'callLogs.status')->leftJoin('users', 'cards.agent_id', '=', 'users.id')
            ->leftJoin('areas', 'cards.area_id', '=', 'areas.id')
            ->leftJoin('blocks', 'cards.block_id', '=', 'blocks.id')
            ->leftJoin('drivers', 'cards.driver_id', '=', 'drivers.id')
            ->leftJoin('statuses', 'cards.status', '=', 'statuses.id')->select('cards.*', 'cards.id as id', 'areas.name as area_name', 'blocks.name as block_name', 'users.first_name as agent_name', 'drivers.driver_name as driver_name', 'statuses.name as status_name')
            ->where('cards.id', $request->id)
            ->first();

        $logs = array();
        foreach ($card->history as $history) {
            array_push($logs, (object)array(
                'created_at' => $history->created_at,
                'icon' => 'fa-truck',
                'date' => $history->created_at->format('d M Y'),
                'time' => $history->created_at->format('H:i a'),
                'title' => $history->status_name,
                'descriprion' => $history->remark ?? '-'
            ));
        }

        foreach ($card->callLogs as $log) {
            array_push($logs, (object)array(
                'created_at' => $log->created_at,
                'icon' => 'fa-phone',
                'date' => $log->created_at->format('d M Y'),
                'time' => $log->created_at->format('H:i a'),
                'title' => 'Call Log ' . ($log->status ? ' > '.$log->status['name'] : ''),
                'descriprion' => $log->log ?? '-'
            ));
        }

        usort($logs, array($this, 'date_compare'));

        return View('admin.cards.all.history', compact('card', 'logs'));
    }

    function date_compare($a, $b)
    {
        $t1 = strtotime($a->created_at);
        $t2 = strtotime($b->created_at);
        return $t2 - $t1;
    }

    public function cardsCountReport(Request $request)
    {
        $monthlyCards = Cards::query()
            ->whereYear('created_at', now()->year)
            ->where('status', $request->status)
            ->get()
            ->groupBy(function ($q) {
                return Carbon::parse($q->created_at)->format('m');
            });

        $months = array();
        foreach ($monthlyCards as $key => $month) {
            array_push($months, array(
                'month' => date("F", mktime(0, 0, 0, $key, 10)),
                'count' => count($month)
            ));
        }

        return response()->json(['status' => 'ok', 'data' => ['months' => $months]]);
    }
}
