<?php

namespace App\Http\Livewire\Frontend\Analysis;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Analysis;


class ViewAnalysis extends Component
{
    public $hospital, $analysis, $prodTimeSelectedQuantity, $quantityCount = 1, $analysisYearId;
    public function yearSelected($analysisYearId){
        $this->analysisYearId = $analysisYearId;
        $analysisYear = $this->analysis->analysisYears()->where('id', $analysisYearId)->first();
        $this->prodTimeSelectedQuantity = $analysisYear->quantity;
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
    // public function addToCart(int $analysisId){
    //     if(Auth::check()){
    //         if($this->analysis->where('id', $analysisId)->where('status', '0')->exists()){
    //             if($this->analysis->analysisYears()->count() > 1){
    //                 if($this->prodYearSelectedQuantity != NULL){
    //                     if(Cart::where('user_id', auth()->user()->id)
    //                             ->where('analysis_id', $analysisId)
    //                             ->where('analysis_year_id', $this->analysisYearId)
    //                             ->exists())
    //                     {
    //                         session()->flash('message', 'Product Already Added');
    //                     }
    //                     else{
    //                         $analysisYear = $this->analysis->analysisYears()->where('id', $this->analysisYearId)->first();
    //                         if($analysisYear->quantity > 0){
    //                             if($analysisYear->quantity > $this->quantityCount){
    //                                 Cart::create([
    //                                     'user_id' => auth()->user()->id,
    //                                     'analysis_id' => $analysisId,
    //                                     'analysis_year_id' =>  $this->analysisYearId,
    //                                     'quantity' => $this->quantityCount
    //                                 ]);
    //                                 $this->emit('CartAddedUpdated');
    //                                 session()->flash('message', 'Product Added to Cart');
    //                             }
    //                             else{
    //                                 session()->flash('message', 'Only '.$analysisYear->quantity.' Quantity Available');
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
    //                 if(Cart::where('user_id', auth()->user()->id)->where('analysis_id', $analysisId)->exists()){
    //                     session()->flash('message', 'Product Already Added');
    //                 }
    //                 else{
    //                     if($this->analysis->quantity > 0){
    //                         if($this->analysis->quantity > $this->quantityCount){
    //                             Cart::create([
    //                                 'user_id' => auth()->user()->id,
    //                                 'analysis_id' => $analysisId,
    //                                 'quantity' => $this->quantityCount
    //                             ]);
    //                             $this->emit('CartAddedUpdated');
    //                             session()->flash('message', 'Product Added to Cart');
    //                         }
    //                         else{
    //                             session()->flash('message', 'Only '.$this->analysis->quantity.' Quantity Available');
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
        // public function addToWishList($analysisId){
    //     if(Auth::check()){
    //         if(Wishlist::where('user_id', auth()->user()->id)->where('analysis_id', $analysisId)->exists()){
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
    //                 'analysis_id' => $analysisId
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
