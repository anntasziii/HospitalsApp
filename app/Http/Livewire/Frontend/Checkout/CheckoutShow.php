<?php

namespace App\Http\Livewire\Frontend\Checkout;
use App\Models\Cart;
use App\Models\UserDetail;
use App\Models\Order;
use App\Models\Orderitem;
use Exception;
use Illuminate\Support\Str;
use App\Mail\PlaceOrderMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

use Livewire\Component;

class CheckoutShow extends Component
{
    public $carts, $totalProductAmount = 0;
    public $fullname, $email, $phone, $comment, $payment_mode = NULL, $payment_id = NULL;
    public $pincode, $address;

    public $listeners = [
        'validationForAll',
        'transactionEmit' => 'paidOnlineOrder'
    ];
    public function validationForAll(){
        $this->validate();
    }

    public function paidOnlineOrder($value){
        $this->payment_id = $value;
        $this->payment_mode = 'Paid by PayPal';

        $codOrder = $this->placeOrder();
        if($codOrder){
            Cart::where('user_id', auth()->user()->id)->delete();

            try{
                $order = Order::findOrFail($codOrder->id);
                Mail::to($order->email)->send(new PlaceOrderMailable($order));
            }
            catch(Exception $e){}

            session()->flash('message', 'Referral Plased Successfully');
            return redirect()->to('thank-you');
        }
        else{
            session()->flash('message', 'Something Went Wrong');
        }
    }

    public function rules(){
        return [
            'fullname' => 'required|string|max:121',
            'email' => 'required|email|max:121',
            'phone' => 'required|string|max:11|min:10',
            'comment' => 'required|string|max:500',
        ];
    }
    public function placeOrder(){
        $this->validate();
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'tracking_no' => 'order-'.Str::random(10),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'comment' => $this->comment,
            'status_message' => 'in progress',
            'payment_mode' => $this->payment_mode,
            'payment_id' => $this->payment_id
        ]);
        foreach ($this->carts as $cartItem){
            Orderitem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'product_time_id' => $cartItem->product_time_id,
                'price' => $cartItem->doctor ? $cartItem->doctor->original_price : ($cartItem->analysis ? $cartItem->analysis->original_price : 0)
            ]);
        }
        return $order;
    }

    public function codOrder(){
        $this->payment_mode = 'Cash payment at the hospital';
        $codOrder = $this->placeOrder();
        if($codOrder){
            Cart::where('user_id', auth()->user()->id)->delete();

            try{
                $order = Order::findOrFail($codOrder->id);
                Mail::to($order->email)->send(new PlaceOrderMailable($order));
            }
            catch(Exception $e){}

            session()->flash('message', 'Referral Plased Successfully');
            return redirect()->to('thank-you');
        }
        else{
            session()->flash('message', 'Something Went Wrong');
        }
    }

    public function totalProductAmount(){
        $this->totalProductAmount = 0;
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($this->carts as $cartItem){
            $this->totalProductAmount += $cartItem->doctor ? $cartItem->doctor->original_price : ($cartItem->analysis ? $cartItem->analysis->original_price : 0);
        }
        return $this->totalProductAmount;
    }
    public function render()
    {
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;

        $userDetail = auth()->user()->userDetail;

        $this->phone = $userDetail ? $userDetail->phone : null;
        $this->pincode = $userDetail ? $userDetail->pin_code : null;
        $this->address = $userDetail ? $userDetail->address : null;

        $this->totalProductAmount = $this->totalProductAmount();
        return view('livewire.frontend.checkout.checkout-show', [
            'totalProductAmount' => $this->totalProductAmount
        ]);
    }
}
