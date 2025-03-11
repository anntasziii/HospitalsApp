<?php

namespace App\Http\Livewire\Frontend\Doctor;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Doctor;


class ViewDoctor extends Component
{
    public $hospital, $doctor, $doctorsTimeSelectedQuantity, $quantityCount = 1, $doctorTimeId;
    public function timeSelected($doctorTimeId){
        $this->doctorTimeId = $doctorTimeId;
        $doctorTime = $this->doctor->doctorTimes()->where('id', $doctorTimeId)->first();
        $this->doctorsTimeSelectedQuantity = $doctorTime->quantity;
        if($this->doctorsTimeSelectedQuantity == 0){
            $this->doctorsTimeSelectedQuantity = 'outOfStock';
        }
    }
    public function dencrementQuantity(){
        if($this->quantityCount > 1)
        {
            $this->quantityCount--;
        }
    }
    public function incrementQuantity(){
        if($this->quantityCount < 10)
        {
            $this->quantityCount++;
        }
    }
    public function mount($hospital, $doctor){
        $this->hospital = $hospital;
        $this->doctor = $doctor;
    }
    public function render()
    {
        return view('livewire.frontend.doctor.view', [
            'doctor' => $this->doctor,
            'hospital' => $this->hospital,
        ]);
    }
    public function addToCart(int $doctorId){
        if(Auth::check()){
           if($this->doctor->where('id', $doctorId)->where('status', '0')->exists()){
               if($this->doctor->doctorTimes()->count() > 1){
                   if($this->doctorsTimeSelectedQuantity != NULL){
                       if(Cart::where('user_id', auth()->user()->id)
                               ->where('product_id', $doctorId)
                               ->where('product_time_id', $this->doctorTimeId)
                               ->exists())
                       {
                           session()->flash('message', 'Doctor Already Added');
                       }
                       else{
                           $doctorTime = $this->doctor->doctorTimes()->where('id', $this->doctorTimeId)->first();
                           if($doctorTime->quantity > 0){
                               if($doctorTime->quantity > $this->quantityCount){
                                   Cart::create([
                                       'user_id' => auth()->user()->id,
                                       'product_id' => $doctorId,
                                       'product_time_id' =>  $this->doctorTimeId,
                                       'quantity' => $this->quantityCount
                                   ]);
                                   $this->emit('CartAddedUpdated');
                                   session()->flash('message', 'Doctor Added to Cart');
                               }
                               else{
                                   session()->flash('message', 'Only '.$doctorTime->quantity.'Appointment available');
                               }
                           }
                           else{
                               session()->flash('message', 'Appointment unavailable');
                           }
                       }
                   }
                   else{
                       session()->flash('message', 'Select your Analysis Time');
                   }
               }
               else{
                   if(Cart::where('user_id', auth()->user()->id)->where('product_id', $doctorId)->exists()){
                       session()->flash('message', 'Doctor already Added');
                   }
                   else{
                       if($this->doctor->quantity > 0){
                           if($this->doctor->quantity > $this->quantityCount){
                               Cart::create([
                                   'user_id' => auth()->user()->id,
                                   'product_id' => $doctorId,
                                   'quantity' => $this->quantityCount
                               ]);
                               $this->emit('CartAddedUpdated');
                               session()->flash('message', 'Doctor added to Referral');
                           }
                           else{
                               session()->flash('message', 'Only '.$this->doctor->quantity.'Appointment available');
                           }
                       }
                       else{
                           session()->flash('message', 'Apointment unavailable');
                       }
                   }
               }
           }
           else{
               session()->flash('message', 'Please Does not Available');
           }
       }
       else{
           session()->flash('message', 'Please Login to Add to the Referral');
       }
   }
        public function addToWishList($doctorId){
        if(Auth::check()){
            if(Wishlist::where('user_id', auth()->user()->id)->where('doctor_id', $doctorId)->exists()){
                session()->flash('message', 'Already added to Plans');
                $this->dispatchBrowserEvent('message', [
                    'text' =>'Already added to Plans',
                    'type' => 'warning',
                    'status' => 409
                ]);
                return false;
            }
            else{
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'doctor_id' => $doctorId,
                    'analysis_id' => auth()->user()->doctor_id ?? 10000
                ]);
                $this->emit('wishlistAddedUpdated');
                session()->flash('message', 'Wishlist Plans Successfully');
                $this->dispatchBrowserEvent('message', [
                    'text' =>'Wishlist Plans Successfully',
                    'type' => 'info',
                    'status' => 200
                ]);
            }
        }
        else{
            session()->flash('message', 'Please Login to Continue');
            $this->dispatchBrowserEvent('message', [
                'text' =>'Please Login to Continue',
                'type' => 'info',
                'status' => 401
            ]);
            return false;
        }
    }
}
