<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\PaymentMethod;
use Illuminate\Support\Facades\Artisan;

class PaymentController extends Controller
{
    public function index()
    {
        return view('theme::payment.index');
    }
    public function create()
    {
        return view('theme::payment.create');
    }
}
