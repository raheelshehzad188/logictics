<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;
use App\User;

class CallcenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('admin.call-center.index');
    }

    public function dataTable(Request $request)
    {
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
        $totalRecords = User::select('count(*) as allcount')->count();

        $username = $request->get("username");
        $agent_name = $request->get("agent_name");
        $contact_number = $request->get("contact_number");
        $status = $request->get("status");
        // Fetch records
        $recordQuery = User::orderBy($columnName, $columnSortOrder)->where('type', '2');
        if ($username) {
            $recordQuery->where('email', 'like', '%' . $username . '%');
        }
        if ($agent_name) {
            $recordQuery->where('first_name', 'like', '%' . $agent_name . '%');
        }
        if ($contact_number) {
            $recordQuery->where('mobile', 'like', '%' . $contact_number . '%');
        }
        if ($status != '') {
            $recordQuery->where('status', $status);
        }
        $totalRecordswithFilter = $recordQuery->select('count(*) as allcount')->count();
        $records = $recordQuery->select('*')->skip($start)->take($rowperpage)->get();
        $data_arr = array();

        foreach ($records as $key => $record) {
            $status_text = '';
            if ($record->status == 1) {
                $status_text = '<span class="badge badge-primary">Active</span>';
            } else {
                $status_text = '<span class="badge badge-danger">Inactive</span>';
            }
            $edit_url = route('admin.callcenter.callcenter.edit', $record->id);
            $url_delete = route('admin.callcenter.callcenter.destroy', $record->id);

            $edit = '<a href="' . $edit_url . '" class="btn btn-sm btn-primary">Edit</a>';
            $edit .= '&nbsp;<a href="' . $url_delete . '" class="btn btn-sm btn-danger" data-confirm="Are you sure to delete this call center ?"> Delete </a>';
            $data_arr[] = array(
                "id" => $key + 1,
                "agent_name" => $record->first_name,
                "contact_number" => $record->mobile,
                "username" => $record->email,
                "status" => $status_text,
                "options" => $edit
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.call-center.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'agent_name' => ['required', 'string'],
            'contact_number' => ['required', 'string'],
            'username' => ['required', 'string'],
            'username' => ['required', 'unique:users,email'],
            'password' => ['required', 'string'],
            'status' => ['required', 'string'],
        ]);

        $callCenter = new User();
        $callCenter->type = '2';
        $callCenter->first_name = $request->agent_name;
        $callCenter->mobile = $request->contact_number;
        $callCenter->email = $request->username;
        $callCenter->password = Hash::make($request['password']);;
        $callCenter->status = $request->status;
        $callCenter->save();

        return redirect()->route('admin.callcenter.callcenter.index')->with('status', 'Call Center details added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $callcenters = User::where('type', '2')->find($id);
        return View('admin.call-center.edit', compact('callcenters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $callCenter = User::where('type', '2')->find($id);
        $request->validate([
            'agent_name' => ['required', 'string'],
            'contact_number' => ['required', 'string'],
            'username' => ['required', 'string'],
            'status' => ['required', 'string'],
        ]);
        $callCenter->first_name = $request->agent_name;
        $callCenter->mobile = $request->contact_number;
        $callCenter->email = $request->username;
        $callCenter->status = $request->status;
        $callCenter->save();

        return redirect()->route('admin.callcenter.callcenter.index')->with('status', 'CallCenter update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $callCenter = User::where('type', '2')->findOrFail($id);
        $callCenter->delete();

        return back()->with('status', 'CallCenter deleted successfully!');
    }
}
