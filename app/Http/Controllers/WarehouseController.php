<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;
use App\UserActivity;
use Illuminate\Support\Facades\Mail;
use App\Mail\WaitingPayment;

class WarehouseController extends Controller
{
    public function order_process()
    {
        return view('theme::warehouse.order_process');
    }

    public function edit_order(Request $request_id)
    {
        $order_id = $request_id->order_id;
        return view('theme::warehouse.edit_order', compact('order_id'));
    }

    public function box_settings()
    {
        return view('theme::warehouse.boxsettings');
    }

    public function box_create(Request $request_id)
    {
        $order_id = $request_id->order_id;
        return view('theme::warehouse.box_create', compact('order_id'));
    }
    public function box_update(Request $request_id)
    {
        $order_id = $request_id->order_id;
        return view('theme::warehouse.box_update', compact('order_id'));
    }
    public function status_change(Request $request_id)
    {
        $order_id = $request_id->order_id;
        return view('theme::warehouse.status_change', compact('order_id'));
    }

    public function show_user(Request $request_id)
    {
        $order_id = $request_id->order_id;
        return view('theme::warehouse.show_user', compact('order_id'));
    }

    public function cancel(Request $request, $id)
    {

        $order = Order::find($id);
        if($order->status == 'Tamamlandı'){
          return redirect()->route('warehouse.order_process');
        }
        $order->status = 'İptal Edildi';
        $user = User::find($order->user_id);
        $old_balance = $user->balance;
        $user->balance += $order->order_total;
        $user->save();
        $order->save();
          UserActivity::create([
            'user_id' => $order->user_id,
            'activity_type' => 'Sipariş İadesi Yapıldı',
            'activity_data' => json_encode([
              'order' => $order->id,
              'price' => $order->order_total,
              'old_balance' => $old_balance,
              'new_balance' => $user->balance
            ])
          ]);

        return redirect()->route('warehouse.order_process');
    }
    public function user_details(Request $request, $id)
    {
        $order = Order::find($id);
        $user = User::find($order->user_id);
        return view('theme::admin.user_details', compact('user'));
    }

    public function skt_add(Request $request, $id)
    {
        return view('theme::fba.skt_add', compact('id'));
    }
    public function payment_mail(Request $request, $id)
    {
        $order = Order::find($id);
        $user = User::find($order->user_id);
        Mail::to($user->email)->send(new WaitingPayment(['order_number' => $order->id ,'user' => $user->name]));
        return redirect()->back()->with('success','Üyeliğiniz iptal edildi.');

    }
}
