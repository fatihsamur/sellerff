<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\UserActivity;
use App\Model\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('theme::admin.index');
    }

    public function deposit_requests_index()
    {
        return view('theme::admin.deposit_requests');
    }

    public function deposit_user()
    {
        return view('theme::admin.deposit_user');
    }

    public function user_list()
    {
        return view('theme::admin.user_list');
    }
    public function user_logs($id)
    {
        return view('theme::admin.user_logs', compact('id'));
    }

    public function reports()
    {
        return view('theme::admin.reports');
    }

    public function user_details(Request $request, $id)
    {
        $user = User::find($id);
        return view('theme::admin.user_details', compact('user'));
    }
}
