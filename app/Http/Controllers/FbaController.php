<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Laravel\Dusk\Browser;
use Laravel\Dusk\Chrome\ChromeProcess;
use Laravel\Dusk\ElementResolver;
use App\Model\Order;
use App\Model\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProductsArrived;

class FbaController extends Controller
{
    public function index()
    {
        return view('theme::fba.index');
    }

    public function create()
    {
        return view('theme::fba.create');
    }

    public function show(Request $request, $id)
    {
        return view('theme::fba.show', compact('id'));
    }

    public function cancel(Request $request, $id)
    {
        $order = Order::find($id);

        $order->status = 'İptal Edildi';
        $order->save();
        return redirect()->route('fba');
    }

    public function update_tracking(Request $request, $id)
    {
        return view('theme::fba.update_tracking', compact('id'));
    }
    public function update_label_fnsku(Request $request, $id)
    {
        return view('theme::fba.update_label_fnsku', compact('id'));
    }
    public function asin_update(Request $request, $id)
    {
        return view('theme::fba.asin_update', compact('id'));
    }


    public function products_arrived(Request $request, $id)
    {
        return redirect()->back()->with('success', 'Üyeliğiniz iptal edildi.');
    }
}
