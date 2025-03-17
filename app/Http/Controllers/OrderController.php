<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
//        $orders = Order::all();
//        $orders = Order::with(["category"])->where("user_id", Auth::id())->orderBy("created_at", "desc")->get();
        $orders = Auth::user()->orders()->with(["category"])->orderBy("created_at", "desc")->get();
//        dd($orders);
        return view("order", compact("orders"));
    }

    public function destroy(Order $order)
    {
//        dd($order);
//        Order::where("id", $order)->delete();
        if($order->user_id !== Auth::id()) {
            abort(404);
        }

        if ($order->delete()) {
            return redirect()->back();
        } else {
            abort(400);
        }
    }
}
