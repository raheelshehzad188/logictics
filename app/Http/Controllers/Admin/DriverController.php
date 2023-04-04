<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Driver;
use App\User;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('admin.driver.index');
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
        $totalRecords = Driver::select('count(*) as allcount')->count();

        $driver_name = $request->get("driver_name");
        $contact_number = $request->get("contact_number");
        $status = $request->get("status");
        // Fetch records
        $recordQuery = Driver::orderBy($columnName, $columnSortOrder);
        if ($driver_name) {
            $recordQuery->where('driver_name', 'like', '%' . $driver_name . '%');
        }
        if ($contact_number) {
            $recordQuery->where('contact_number', 'like', '%' . $contact_number . '%');
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
            $edit_url = route('admin.driver.driver.edit', $record->id);
            $url_delete = route('admin.driver.driver.destroy', $record->id);

            $edit = '<a href="' . $edit_url . '" class="btn btn-sm btn-primary">Edit</a>';
            $edit .= '&nbsp;<a href="' . $url_delete . '" class="btn btn-sm btn-danger" data-confirm="Are you sure to delete this driver ?"> Delete </a>';
            $data_arr[] = array(
                "id" => $key + 1,
                "driver_name" => $record->driver_name,
                "contact_number" => $record->contact_number,
                "capacity" => $record->capacity,
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
        return View('admin.driver.create');
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
            'driver_name' => ['required', 'string'],
             'email' => ['required', 'email', 'unique:users,email'],
             'password' => ['required', 'min:6'],
            'contact_number' => ['required', 'string'],
            'capacity' => ['required', 'integer'],
            'status' => ['required', 'string'],
        ]);
         $user = new User();
         $user->email = $request->email;
         $user->password = bcrypt($request->password);
         $user->status = 1;
         $user->type = 5;
         $user->save();

        $Driver = new Driver();
        $Driver->user_id = $user->id;
        $Driver->driver_name = $request->driver_name;
        $Driver->contact_number = $request->contact_number;
        $Driver->capacity = $request->capacity;
        $Driver->status = $request->status;
        $Driver->save();

        return redirect()->route('admin.driver.driver.index')->with('status', 'Driver details added successfully!');
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
        $drivers = Driver::find($id);
        return View('admin.driver.edit', compact('drivers'));
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
        $Driver = Driver::find($id);
        $request->validate([
            'driver_name' => ['required', 'string'],
             'email' => ['required', 'email'],
            'contact_number' => ['required', 'string'],
            'capacity' => ['required', 'integer'],
            'status' => ['required', 'string'],
        ]);
        if(!empty($Driver->user_id)){
            $user = User::whereId($Driver->user_id)->first();
            $user->email = $request->email;
            $user->save();
        }else{
            $user = new User();
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->status = 1;
            $user->type = 5;
            $user->save();
        }


        $Driver->driver_name = $request->driver_name;
        $Driver->user_id = $user->id;
        $Driver->contact_number = $request->contact_number;
        $Driver->capacity = $request->capacity;
        $Driver->status = $request->status;
        $Driver->save();

        return redirect()->route('admin.driver.driver.index')->with('status', 'Driver details updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Driver = Driver::findOrFail($id);
        $Driver->delete();

        return back()->with('status', 'Driver deleted successfully!');
    }
}
