<?php

namespace App\Http\Livewire\Frontend\Analysis;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Analysis;


class ViewAnalysis extends Component
{
    public $hospital, $analysis, $analysesTimeSelectedQuantity, $quantityCount = 1, $analysisTimeId;
    public function timeSelected($analysisTimeId){
        $this->analysisTimeId = $analysisTimeId;
        $analysisTime = $this->analysis->analysisTimes()->where('id', $analysisTimeId)->first();
        $this->analysesTimeSelectedQuantity = $analysisTime->quantity;
        if($this->analysesTimeSelectedQuantity == 0){
            $this->analysesTimeSelectedQuantity = 'outOfStock';
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
    public function mount($hospital, $analysis){
        $this->hospital = $hospital;
        $this->analysis = $analysis;
    }
    public function render()
    {
        return view('livewire.frontend.analysis.view', [
            'analysis' => $this->analysis,
            'hospital' => $this->hospital,
        ]);
    }
    public function addToCart(int $analysisId){
         if(Auth::check()){
            if($this->analysis->where('id', $analysisId)->where('status', '0')->exists()){
                if($this->analysis->analysisTimes()->count() > 1){
                    if($this->analysesTimeSelectedQuantity != NULL){
                        if(Cart::where('user_id', auth()->user()->id)
                                ->where('product_id', $analysisId)
                                ->where('product_time_id', $this->analysisTimeId)
                                ->exists())
                        {
                            session()->flash('message', 'Analysis Already Added');
                        }
                        else{
                            $analysisTime = $this->analysis->analysisTimes()->where('id', $this->analysisTimeId)->first();
                            if($analysisTime->quantity > 0){
                                if($analysisTime->quantity > $this->quantityCount){
                                    Cart::create([
                                        'user_id' => auth()->user()->id,
                                        'product_id' => $analysisId,
                                        'product_time_id' =>  $this->analysisTimeId,
                                        'quantity' => $this->quantityCount
                                    ]);
                                    $this->emit('CartAddedUpdated');
                                    session()->flash('message', 'Product Added to Cart');
                                }
                                else{
                                    session()->flash('message', 'Only '.$analysisTime->quantity.'Appointment available');
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
                    if(Cart::where('user_id', auth()->user()->id)->where('product_id', $analysisId)->exists()){
                        session()->flash('message', 'Analysis already Added');
                    }
                    else{
                        if($this->analysis->quantity > 0){
                            if($this->analysis->quantity > $this->quantityCount){
                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $analysisId,
                                    'quantity' => $this->quantityCount
                                ]);
                                $this->emit('CartAddedUpdated');
                                session()->flash('message', 'Analysis added to Referral');
                            }
                            else{
                                session()->flash('message', 'Only '.$this->analysis->quantity.'Appointment available');
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

        public function addToWishList($analysisId){
        if(Auth::check()){
            if(Wishlist::where('user_id', auth()->user()->id)->where('analysis_id', $analysisId)->exists()){
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
                    'analysis_id' => $analysisId,
                    'doctor_id' => auth()->user()->doctor_id ?? 10000
                ]);
                $this->emit('wishlistAddedUpdated');
                session()->flash('message', 'Plans Added Successfully');
                $this->dispatchBrowserEvent('message', [
                    'text' =>'Plans Added Successfully',
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
