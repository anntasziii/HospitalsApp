<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ViewAnalysis extends Component
{
    public $category, $product, $prodYearSelectedQuantity, $quantityCount = 1, $productYearId;
    public function addToWishList($productId){
        if(Auth::check()){
            if(Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()){
                session()->flash('message', 'Already added to Wishlist');
                $this->dispatchBrowserEvent('message', [
                    'text' =>'Already added to Wishlist',
                    'type' => 'warning',
                    'status' => 409
                ]);
                return false;
            }
            else{
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);
                $this->emit('wishlistAddedUpdated');
                session()->flash('message', 'Wishlist Added Successfully');
                $this->dispatchBrowserEvent('message', [
                    'text' =>'Wishlist Added Successfully',
                    'type' => 'success',
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
    public function yearSelected($productYearId){
        $this->productYearId = $productYearId;
        $productYear = $this->product->productYears()->where('id', $productYearId)->first();
        $this->prodYearSelectedQuantity = $productYear->quantity;
        if($this->prodYearSelectedQuantity == 0){
            $this->prodYearSelectedQuantity = 'outOfStock';
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
    public function addToCart(int $productId){
        if(Auth::check()){
            if($this->product->where('id', $productId)->where('status', '0')->exists()){
                if($this->product->productYears()->count() > 1){
                    if($this->prodYearSelectedQuantity != NULL){
                        if(Cart::where('user_id', auth()->user()->id)
                                ->where('product_id', $productId)
                                ->where('product_year_id', $this->productYearId)
                                ->exists())
                        {
                            session()->flash('message', 'Product Already Added');
                        }
                        else{
                            $productYear = $this->product->productYears()->where('id', $this->productYearId)->first();
                            if($productYear->quantity > 0){
                                if($productYear->quantity > $this->quantityCount){
                                    Cart::create([
                                        'user_id' => auth()->user()->id,
                                        'product_id' => $productId,
                                        'product_year_id' =>  $this->productYearId,
                                        'quantity' => $this->quantityCount
                                    ]);
                                    $this->emit('CartAddedUpdated');
                                    session()->flash('message', 'Product Added to Cart');
                                }
                                else{
                                    session()->flash('message', 'Only '.$productYear->quantity.' Quantity Available');
                                }
                            }
                            else{
                                session()->flash('message', 'Out of Stock');
                            }
                        }
                    }
                    else{
                        session()->flash('message', 'Select Your Product Year');
                    }
                }
                else{
                    if(Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()){
                        session()->flash('message', 'Product Already Added');
                    }
                    else{
                        if($this->product->quantity > 0){
                            if($this->product->quantity > $this->quantityCount){
                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $productId,
                                    'quantity' => $this->quantityCount
                                ]);
                                $this->emit('CartAddedUpdated');
                                session()->flash('message', 'Product Added to Cart');
                            }
                            else{
                                session()->flash('message', 'Only '.$this->product->quantity.' Quantity Available');
                            }
                        }
                        else{
                            session()->flash('message', 'Out of Stock');
                        }
                    }
                }
            }
            else{
                session()->flash('message', 'Please Does not Exists');
            }
        }
        else{
            session()->flash('message', 'Please Login to Add to the Cart');
        }
    }
    public function mount($category, $product){
        $this->category = $category;
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.frontend.product.view', [
            'category' => $this->category,
            'product' => $this->product
        ]);
    }
}
