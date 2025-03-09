<div style="background-color: rgb(248, 249, 250)">
    <div class="py-3 py-md-5">
        <div class="container">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="text-center p-3" wire:ignore>
                        @if($analysis->analysisImages && $analysis->analysisImages->isNotEmpty())
                            <img src="{{ asset($analysis->analysisImages->first()->image) }}"
                                 alt="Doctor Image"
                                 style="border-radius: 15px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); max-width: 100%; height: 500px;">
                        @else
                            <p>No Images Added</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-7 mt-3 card-biography">
                    <div class="product-view m-3">
                        <h2 class="product-name mt-3" style="letter-spacing: 1px; color: #002b80; text-transform: uppercase;">
                            {{$analysis->name}}
                        </h2>
                        <hr style="color: #6699ff">
                        <p class="product-path" style="font-size: 16px">
                            Home / {{$analysis->hospital->name}} / {{$analysis->name}}
                        </p>
                        <div>
                            @if($analysis->original_price > 0)
                                <span class="selling-price">Price: ₴{{$analysis->original_price}}</span>
                            @endif
                        </div>


                        <div>
                            @if ($analysis->analysisTimes->count()>0)
                                @if($analysis->analysisTimes)
                                    @foreach ($analysis->analysisTimes as $timeItem)
                                        <label class="yearSelectionLabel"
                                            wire:click="timeSelected({{$timeItem->id}})"
                                            >
                                            {{$timeItem->time->name}}
                                        </label>
                                    @endforeach
                                @endif
                                <div>
                                    @if ($this->analysesTimeSelectedQuantity == 'outOfStock')
                                        <label class="btn-sm py-1 mt-2 text-white bg-danger">Appointment unavailable</label>
                                    @elseif ($this->analysesTimeSelectedQuantity > 0)
                                        <label class="btn-sm py-1 mt-2 text-white bg-success">Appointment available</label>
                                    @endif
                                </div>
                            @else
                                @if ($analysis->quantity)
                                    <label class="btn-sm py-1 mt-2 text-white bg-success">Appointment available</label>
                                @else
                                    <label class="btn-sm py-1 mt-2 text-white bg-danger">Appointment unavailable</label>
                                @endif
                            @endif
                        </div>

                        {{-- <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click="dencrementQuantity"><i class="fa fa-minus"></i></span>
                                <input type="text" wire:model="quantityCount" value="{{$this->quantityCount}}" readonly class="input-quantity" />
                                <span class="btn btn1" wire:click="incrementQuantity"><i class="fa fa-plus"></i></span>
                            </div>
                        </div> --}}
                        <div class="mt-2">
                            <button type="button" wire:click="addToCart({{$analysis->id}})" class="btn btn1" style="border-radius: 10px; height: 40px; width: 180px; font-size: 18px;">
                                <i class="fa fa-shopping-cart"></i> Add to entry
                            </button>
                            <button type="button" wire:click="addToWishList({{$analysis->id}})" class="btn btn1" style="border-radius: 10px; height: 40px; width: 180px; font-size: 18px;">
                                <span wire:target="addToWishList">
                                    <i class="fa fa-heart"></i> Add to plans
                                </span>
                            </button>
                        </div>
                        <hr style="color: #6699ff; margin-top: 25px;">
                        <div class="mt-3">
                            <h5 class="mb-0" style="color: #002b80; text-transform: uppercase;">Who needs this analysis?</h5>
                            <p>
                                {!! $analysis->small_description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card-biography" style="padding: 10px">
                        <div>
                            <h4 style="margin-left: 15px; margin-top: 10px; color: #002b80; text-transform: uppercase;">Analysis description:</h4>
                            <hr style="color: #6699ff">
                        </div>
                        <div style="margin-left: 15px">
                            <p>
                                {!! $analysis->description !!}
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
