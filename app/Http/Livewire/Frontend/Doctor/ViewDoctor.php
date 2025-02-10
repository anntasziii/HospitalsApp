<?php

namespace App\Http\Livewire\Frontend\Doctor;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Doctor;


class ViewDoctor extends Component
{
    public $hospital, $doctor, $prodTimeSelectedQuantity, $quantityCount = 1, $doctorYearId;
    public function yearSelected($doctorYearId){
        $this->doctorYearId = $doctorYearId;
        $doctorYear = $this->doctor->doctorYears()->where('id', $doctorYearId)->first();
        $this->prodTimeSelectedQuantity = $doctorYear->quantity;
        if($this->prodTimeSelectedQuantity == 0){
            $this->prodTimeSelectedQuantity = 'outOfStock';
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
    // public function addToCart(int $doctorId){
    //     if(Auth::check()){
    //         if($this->doctor->where('id', $doctorId)->where('status', '0')->exists()){
    //             if($this->doctor->doctorYears()->count() > 1){
    //                 if($this->prodYearSelectedQuantity != NULL){
    //                     if(Cart::where('user_id', auth()->user()->id)
    //                             ->where('doctor_id', $doctorId)
    //                             ->where('doctor_year_id', $this->doctorYearId)
    //                             ->exists())
    //                     {
    //                         session()->flash('message', 'Product Already Added');
    //                     }
    //                     else{
    //                         $doctorYear = $this->doctor->doctorYears()->where('id', $this->doctorYearId)->first();
    //                         if($doctorYear->quantity > 0){
    //                             if($doctorYear->quantity > $this->quantityCount){
    //                                 Cart::create([
    //                                     'user_id' => auth()->user()->id,
    //                                     'doctor_id' => $doctorId,
    //                                     'doctor_year_id' =>  $this->doctorYearId,
    //                                     'quantity' => $this->quantityCount
    //                                 ]);
    //                                 $this->emit('CartAddedUpdated');
    //                                 session()->flash('message', 'Product Added to Cart');
    //                             }
    //                             else{
    //                                 session()->flash('message', 'Only '.$doctorYear->quantity.' Quantity Available');
    //                             }
    //                         }
    //                         else{
    //                             session()->flash('message', 'Out of Stock');
    //                         }
    //                     }
    //                 }
    //                 else{
    //                     session()->flash('message', 'Select Your Product Year');
    //                 }
    //             }
    //             else{
    //                 if(Cart::where('user_id', auth()->user()->id)->where('doctor_id', $doctorId)->exists()){
    //                     session()->flash('message', 'Product Already Added');
    //                 }
    //                 else{
    //                     if($this->doctor->quantity > 0){
    //                         if($this->doctor->quantity > $this->quantityCount){
    //                             Cart::create([
    //                                 'user_id' => auth()->user()->id,
    //                                 'doctor_id' => $doctorId,
    //                                 'quantity' => $this->quantityCount
    //                             ]);
    //                             $this->emit('CartAddedUpdated');
    //                             session()->flash('message', 'Product Added to Cart');
    //                         }
    //                         else{
    //                             session()->flash('message', 'Only '.$this->doctor->quantity.' Quantity Available');
    //                         }
    //                     }
    //                     else{
    //                         session()->flash('message', 'Out of Stock');
    //                     }
    //                 }
    //             }
    //         }
    //         else{
    //             session()->flash('message', 'Please Does not Exists');
    //         }
    //     }
    //     else{
    //         session()->flash('message', 'Please Login to Add to the Cart');
    //     }
    // }
        // public function addToWishList($doctorId){
    //     if(Auth::check()){
    //         if(Wishlist::where('user_id', auth()->user()->id)->where('doctor_id', $doctorId)->exists()){
    //             session()->flash('message', 'Already added to Wishlist');
    //             $this->dispatchBrowserEvent('message', [
    //                 'text' =>'Already added to Wishlist',
    //                 'type' => 'warning',
    //                 'status' => 409
    //             ]);
    //             return false;
    //         }
    //         else{
    //             Wishlist::create([
    //                 'user_id' => auth()->user()->id,
    //                 'doctor_id' => $doctorId
    //             ]);
    //             $this->emit('wishlistAddedUpdated');
    //             session()->flash('message', 'Wishlist Added Successfully');
    //             $this->dispatchBrowserEvent('message', [
    //                 'text' =>'Wishlist Added Successfully',
    //                 'type' => 'success',
    //                 'status' => 200
    //             ]);
    //         }
    //     }
    //     else{
    //         session()->flash('message', 'Please Login to Continue');
    //         $this->dispatchBrowserEvent('message', [
    //             'text' =>'Please Login to Continue',
    //             'type' => 'info',
    //             'status' => 401
    //         ]);
    //         return false;
    //     }
    // }
}
