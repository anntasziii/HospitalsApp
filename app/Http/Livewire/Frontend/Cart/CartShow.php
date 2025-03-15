<?php

namespace App\Http\Livewire\Frontend\Cart;

use Livewire\Component;
use App\Models\Cart;

class CartShow extends Component
{
    public $cart, $totalPrice = 0;
    public function decrementQuantity(int $cartId){
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if($cartData){
            if($cartData->productTime()->where('id', $cartData->product_time_id)->exists()){
                $productTime = $cartData->productTime()->where('id', $cartData->product_time_id)->first();
                if($productTime->quantity > $cartData->quantity){
                    $cartData->decrement('quantity');
                    session()->flash('message', 'Appointment updated');
                }
                else{
                    session()->flash('message', 'Only '.$productTime->quantity. 'Appointment available');
                }
            }
            else{
                if($cartData->product->quantity > $cartData->quantity){
                    $cartData->decrement('quantity');
                    session()->flash('message', 'Appointment updated');
                }
                else{
                    session()->flash('message', 'Only '.$cartData->product->quantity. 'Appointment available');
                }
            }
        }
        else{
            session()->flash('message', 'Something Went Wrong');
        }
    }
    public function incrementQuantity(int $cartId){
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if($cartData){
            if($cartData->productTime()->where('id', $cartData->product_time_id)->exists()){
                $productTime = $cartData->productTime()->where('id', $cartData->product_time_id)->first();
                if($productTime->quantity > $cartData->quantity){
                    $cartData->increment('quantity');
                    session()->flash('message', 'Appointment updated');
                }
                else{
                    session()->flash('message', 'Only '.$productTime->quantity. 'Appointment available');
                }
            }
            else{
                if($cartData->product->quantity > $cartData->quantity){
                    $cartData->increment('quantity');
                    session()->flash('message', 'Appointment updated');
                }
                else{
                    session()->flash('message', 'Only '.$cartData->product->quantity. 'Appointment available');
                }
            }
        }
        else{
            session()->flash('message', 'Something Went Wrong');
        }
    }
    public function removeCartItem(int $cartId)
    {
        $cartItem = Cart::where('user_id', auth()->user()->id)->where('id', $cartId)->first();

        if ($cartItem) {
            $cartItem->delete();
            $this->cart = $this->cart->where('id', '!=', $cartId);
            $this->emit('CartAddedUpdated');
            session()->flash('message', 'Item removed from cart');
        } else {
            session()->flash('message', 'Something went wrong');
        }
    }

    public function render()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)
            ->with(['doctor', 'analysis', 'doctorTime', 'analysisTime'])
            ->get();

        return view('livewire.frontend.cart.cart-show', [
            'cart' => $this->cart,
            'totalPrice' => $this->cart->sum(function ($cartItem) {
                return $cartItem->doctor ? $cartItem->doctor->price : ($cartItem->analysis ? $cartItem->analysis->price : 0);
            }),
        ]);
    }
}

