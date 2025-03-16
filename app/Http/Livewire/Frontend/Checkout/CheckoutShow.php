<?php

namespace App\Http\Livewire\Frontend\Checkout;
use App\Models\Cart;

use Livewire\Component;

class CheckoutShow extends Component
{
    public $carts, $totalProductAmount = 0;
    public $fullname, $email, $phone, $comment, $payment_mode = NULL, $payment_id = NULL;

    public function rules(){
        return [
            'fullname' => 'required|string|max:121',
            'email' => 'required|email|max:121',
            'phone' => 'required|string|max:11|min:10',
            'comment' => 'required|string|max:500',
        ];
    }
    // public function codOrder(){
    //     $this->payment_mode = 'Cash in Delivery';
    //     $codOrder = $this->placeOrder();
    //     if($codOrder){
    //         Cart::where('user_id', auth()->user()->id)->delete();
    //         session()->flash('message', 'Order Plased Successfully');
    //         return redirect()->to('thank-you');
    //     }
    //     else{
    //         session()->flash('message', 'Something Went Wrong');
    //     }
    // }
    public function codOrder(){
        $validatedData = $this->validate();
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
        $this->totalProductAmount = $this->totalProductAmount();
        return view('livewire.frontend.checkout.checkout-show', [
            'totalProductAmount' => $this->totalProductAmount
        ]);
    }
}
