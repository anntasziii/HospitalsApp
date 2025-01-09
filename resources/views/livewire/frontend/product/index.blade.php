<div>
    <div class="row">
        <div class="col-md-3">
            @if ($category->brands)
                <div class="card">
                    <div class="card-header"><h4>Бренди запчастин</h4></div>
                    <div class="card-body">
                        @foreach ($category->brands as $brandItem)
                            <label class="d-block">
                                <input type="checkbox" wire:model="brandInputs" value="{{$brandItem->name}}" /> {{$brandItem->name}}
                            </label>
                        @endforeach
                    </div>
                </div>
            @endif
            <div class="card mt-3">
                <div class="card-header"><h4>Ціна</h4></div>
                <div class="card-body">
                    <label class="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInput" value="high-to-low" /> Найвища - найнища
                    </label>
                    <label class="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInput" value="low-to-high" /> Найнища - найвища
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                @forelse ($products as $productItem)
                    <div class="col-md-4">
                        <div class="product-card">
                            <div class="product-card-img" style="width: 100%; height: 250px; text-align: center;">
                                @if ($productItem->quantity > 0)
                                    <label class="stock bg-success">Товар наявний</label>
                                @else
                                    <label class="stock bg-danger">Товар відсутній</label>
                                @endif
                                @if ($productItem->productImages->count()>0)
                                    <a href="{{url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                        <img src="{{asset($productItem->productImages[0]->image)}}" alt="{{$productItem->name}}"
                                        style="max-width: 100%; max-height: 100%; display: inline-block; vertical-align: middle;">
                                    </a>
                                @endif
                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{$productItem->brand}}</p>
                                <h5 class="product-name">
                                <a href="{{url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                        {{$productItem->name}}
                                </a>
                                </h5>
                                <div>
                                    <span class="selling-price">₴{{$productItem->selling_price}}</span>
                                    <span class="original-price">₴{{$productItem->original_price}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No Products Available for {{$category->name}}</h4>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
