<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\PaymentMethod;
use App\Model\Ticket;
use Illuminate\Support\Facades\Artisan;

class SupportController extends Controller
{
    public function index()
    {
        return view('theme::ticket.index');
    }
    public function create(Request $id)
    {
        return view('theme::ticket.create');
    }
    public function show(Request $request, $id)
    {
        return view('theme::ticket.show', compact('id'));
    }
}
