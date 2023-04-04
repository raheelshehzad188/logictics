<?php

namespace App\Http\Controllers\Admin\Cards;

use App\CardsHistory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Cards;
use App\User;
use Illuminate\Support\Facades\Auth;

class NewlyArrivedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_call_centers = User::where('status', 1)->where('type', 2)->get();
        return View('admin.cards.newly-arrived.index', compact('all_call_centers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.cards.newly-arrived.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'fileimport' => 'required',
        ]);
        try {
            $csvfile = $request->fileimport;
            $exten = $csvfile->getClientOriginalExtension();
            $path1 = $request->file('fileimport')->store('temp');
            $path = storage_path('app') . '/public/' . $path1;
            $csvData = file_get_contents($path);
            $rows = array_map('str_getcsv', explode("\n", $csvData));
            if ($exten != "csv") {
                return response()->json(['extension_error' => 'File Should Be CSV.']);
            }
            if (!empty($rows)) {
                for ($r = 1; $r < count($rows); $r++) {
                    if (!empty($rows[$r][0])) {
                        $Cards = new Cards();
                        $Cards->batch_no = $rows[$r][1];
                        $Cards->batch_sr_no = $rows[$r][2];
                        $Cards->card_no = $rows[$r][3];
                        $Cards->customer_name = $rows[$r][4];
                        $Cards->cif_no = $rows[$r][5];
                        $Cards->civil_id = $rows[$r][6];
                        $Cards->mobile_no = $rows[$r][7];
                        $Cards->telephone_no = $rows[$r][8];
                        $Cards->status = 0;
                        $Cards->save();

                        $carHistory = new CardsHistory();
                        $carHistory->card_id = $Cards->id;
                        $carHistory->status_id = $Cards->status;
                        $carHistory->agent_id = $Cards->agent_id;
                        $carHistory->driver_id = $Cards->driver_id;
                        $carHistory->updated_by = Auth::user()->id;
                        $carHistory->remark = 'The status of the card is changed to Newly Arrived';
                        $carHistory->save();
                    }
                }
                return response()->json(['status' => 'success', 'msg' => 'You have successfully upload file.']);
            } else {
                return response()->json(['status' => 'error', 'msg' => 'Csv not imported!']);
            }
        } catch (Exception $exception) {
            return response()->json(['status' => 'error', 'msg' => $exception->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Cards = Cards::findOrFail($id);
        $Cards->delete();

        return back()->with('status', 'Card deleted successfully!');
    }
}
