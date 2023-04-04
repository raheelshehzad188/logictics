<?php

namespace App\Http\Controllers\Admin\Cards;

use App\Http\Controllers\Controller;
use App\Status;
use Illuminate\Http\Request;
use App\User;

class AssignToAgentController extends Controller
{
    public function index()
    {
        $all_status = Status::where('id', '!=', 5)->get();
        $all_call_centers = User::where('status', 1)->where('type', 2)->get();
        return View('admin.cards.assign-to-agent.index', compact('all_call_centers', 'all_status'));
    }
}
