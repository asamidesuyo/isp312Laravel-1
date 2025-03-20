<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Enums\Order\StatusEnum;

class AdminController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy("status")->get();
        return view("admin", compact("orders"));
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->back();
    }

    public function edit(Order $order)
    {
        return view("update", compact("order"));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|string|in:Новый,В работе,Выполнен,Отклонен',
        ]);

        $order->status = StatusEnum::from($request->status); // Преобразуем в Enum
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'Статус заказа обновлен');

    }


}
