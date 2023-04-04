<?php

namespace App\Http\Controllers\Admin\Cards;

use App\CallLogs;
use App\Http\Controllers\Controller;
use App\Status;
use Illuminate\Http\Request;
use App\Cards;
use App\Area;
use App\Block;
use Illuminate\Support\Facades\Auth;

class CallCenterAgentController extends Controller
{
    public function index()
    {
        return View('admin.cards.call_center.index');
    }

    public function print($id = '')
    {
        $records = Cards::where('cards.id', $id)
            ->leftJoin('users', 'cards.agent_id', '=', 'users.id')
            ->leftJoin('areas', 'cards.area_id', '=', 'areas.id')
            ->leftJoin('blocks', 'cards.block_id', '=', 'blocks.id')
            ->leftJoin('drivers', 'cards.driver_id', '=', 'drivers.id')
            ->select('cards.*', 'cards.id as id', 'areas.name as area_name', 'blocks.name as block_name')
            ->get();

        return View('admin.cards.call_center.print', compact('records'));
    }

    public function printStickers(Request $request)
    {
        $request->validate([
            'slected_row_id' => ['required']
        ]);
        $all_row_id = $request->slected_row_id;

        $records = Cards::whereIn('cards.id', $all_row_id)
            ->leftJoin('users', 'cards.agent_id', '=', 'users.id')
            ->leftJoin('areas', 'cards.area_id', '=', 'areas.id')
            ->leftJoin('blocks', 'cards.block_id', '=', 'blocks.id')
            ->leftJoin('drivers', 'cards.driver_id', '=', 'drivers.id')
            ->select('cards.*', 'cards.id as id', 'areas.name as area_name', 'blocks.name as block_name')
            ->get();
        return View('admin.cards.call_center.print', compact('records'));
    }

    public function logs(Request $request)
    {

        $card = Cards::where('cards.id', $request->id)
            ->leftJoin('users', 'cards.agent_id', '=', 'users.id')
            ->leftJoin('areas', 'cards.area_id', '=', 'areas.id')
            ->leftJoin('blocks', 'cards.block_id', '=', 'blocks.id')
            ->leftJoin('drivers', 'cards.driver_id', '=', 'drivers.id')
            ->select('cards.*', 'cards.id as id', 'areas.name as area_name', 'blocks.name as block_name')
            ->with('callLogs', 'callLogs.status')
            ->first();

//        dd($card->toArray());

        $all_status = Status::where('parent_id', 5)->get();

        return View('admin.cards.call_center.logs', compact('card', 'all_status'));
    }

    public function storelogs(Request $request)
    {

        $log = new CallLogs();
        $log->card_id = $request->card_id;
        $log->log = $request->log;
        $log->log_datetime = $request->log_datetime;
        $log->status_id = $request->status_id;
        $log->save();

        return redirect()->route('admin.cards.call-logs', ['id' => $request->card_id])->with('status', 'Log added successfully');
    }
}
