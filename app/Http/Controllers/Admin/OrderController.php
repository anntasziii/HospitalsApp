<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    public function index(Request $request){
        $todayDate = Carbon::now()->format('Y-m-d');
        $orders = Order::when($request->date != null, function($q) use($request){
                    return $q->whereDate('created_at', $request->date);
                }, function($q) use($todayDate){
                    return $q->whereDate('created_at', $todayDate);
                })
                ->when($request->status != null, function($q) use($request){
                    return $q->where('status_message', $request->status);
                })
                ->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }
    public function show(int $orderId){
        $order = Order::where('id', $orderId)->first();
        if($order){
            return view('admin.orders.view', compact('order'));
        }
        else{
            return redirect('admin/orders')->with('message', 'Referral Id not Found');
        }
    }
    public function updateOrderStatus(int $orderId, Request $request){
        $order = Order::where('id', $orderId)->first();
        if($order){
            $order->update([
                'status_message' => $request->order_status
            ]);
            return redirect('admin/orders/'.$orderId)->with('message', 'Referral Status Updated');
        }
        else{
            return redirect('admin/orders/'.$orderId)->with('message', 'Referral Id not Found');
        }
    }
}
