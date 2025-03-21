<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(10);
        return view('frontend.orders.index', compact('orders'));
    }
    public function show($orderId){
        $order = Order::where('user_id', Auth::id())
            ->where('id', $orderId)
            ->with(['orderItems.doctor', 'orderItems.analysis', 'orderItems.doctorTime.time', 'orderItems.analysisTime.time'])
            ->first();

        if($order){
            return view('frontend.orders.view', compact('order'));
        }
        else{
            return redirect()->back()->with('message', 'No Referral Found');
        }
    }
}
