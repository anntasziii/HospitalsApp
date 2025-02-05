<div>
    <div class="py-3 py-md-5">
        <div class="container">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <div class="row bg-white">
                <div class="col-md-5 mt-3">
                    <div class="bg-white" wire:ignore>
                        @if($product->productImages)
                            <div class="exzoom" id="exzoom">
                                <div class="exzoom_img_box bg-white">
                                  <ul class='exzoom_img_ul'>
                                    @foreach ($product->productImages as $itemImg)
                                        <li><img src="{{asset($itemImg->image)}}"/></li>
                                    @endforeach
                                  </ul>
                                </div>
                                <div class="exzoom_nav"></div>
                                <p class="exzoom_btn">
                                    <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                                    <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                                </p>
                            </div>
                        @else
                            No Images Added
                        @endif
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{$product->name}}
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{$product->category->name}} / {{$product->name}}
                        </p>
                        <div>
                            <span class="selling-price">₴{{$product->selling_price}}</span>
                            <span class="original-price">₴{{$product->original_price}}</span>
                        </div>
                        <div>
                            @if ($product->productYears->count()>0)
                                @if($product->productYears)
                                    @foreach ($product->productYears as $yearItem)
                                        <label class="yearSelectionLabel"
                                            wire:click="yearSelected({{$yearItem->id}})"
                                            >
                                            {{$yearItem->year->name}}
                                        </label>
                                    @endforeach
                                @endif
                                <div>
                                    @if ($this->prodYearSelectedQuantity == 'outOfStock')
                                        <label class="btn-sm py-1 mt-2 text-white bg-danger">Товар відсутній</label>
                                    @elseif ($this->prodYearSelectedQuantity > 0)
                                        <label class="btn-sm py-1 mt-2 text-white bg-success">Товар наявний</label>
                                    @endif
                                </div>
                            @else
                                @if ($product->quantity)
                                    <label class="btn-sm py-1 mt-2 text-white bg-success">Товар наявний</label>
                                @else
                                    <label class="btn-sm py-1 mt-2 text-white bg-danger">Товар відсутній</label>
                                @endif
                            @endif
                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click="dencrementQuantity"><i class="fa fa-minus"></i></span>
                                <input type="text" wire:model="quantityCount" value="{{$this->quantityCount}}" readonly class="input-quantity" />
                                <span class="btn btn1" wire:click="incrementQuantity"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="button" wire:click="addToCart({{$product->id}})" class="btn btn1">
                                <i class="fa fa-shopping-cart"></i> Додати до корзини
                            </button>
                            <button type="button" wire:click="addToWishList({{$product->id}})" class="btn btn1">
                                <span wire:target="addToWishList">
                                    <i class="fa fa-heart"></i> Додати до вподобань
                                </span>
                            </button>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Товар для машин: </h5>
                            <p>
                                {!! $product->small_description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Опис деталі</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {!! $product->description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@push('scripts')
    <script>
        $(function(){
            $("#exzoom").exzoom({
            "navWidth": 60,
            "navHeight": 60,
            "navItemNum": 5,
            "navItemMargin": 7,
            "navBorder": 1,
            "autoPlay": false,
            "autoPlayTimeout": 2000
            });
        });
    </script>
@endpush
