<div>
    <div class="row">
        <div class="col-md-3">
            @if ($hospital->types)
                <div class="card">
                    <div class="card-header"><h4>Type of doctors and analysys</h4></div>
                    <div class="card-body">
                        @foreach ($hospital->types as $typeItem)
                            <label class="d-block">
                                <input type="checkbox" wire:model="typeInputs" value="{{$typeItem->name}}" /> {{$typeItem->name}}
                            </label>
                        @endforeach
                    </div>
                </div>
            @endif
            <div class="product-card">
                <div class="card-header"><h4>Price</h4></div>
                <div class="card-body radio-container">
                    <label>
                        <input type="radio" name="priceSort" wire:model="priceInput" value="high-to-low" />
                        Highest - Lowest
                    </label>
                    <label>
                        <input type="radio" name="priceSort" wire:model="priceInput" value="low-to-high" />
                        Lowest - Highest
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                @forelse ($doctors as $doctorItem)
                    <div class="col-md-4">
                        <div class="product-card">
                            <div class="product-card-img" style="width: 100%; height: 250px; text-align: center;">
                                @if ($doctorItem->quantity > 0)
                                    <label class="stock bg-success">Appointment available</label>
                                @else
                                    <label class="stock bg-danger">Appointment available</label>
                                @endif
                                @if ($doctorItem->doctorImages->count()>0)
                                    <a href="{{url('/collections/'.$doctorItem->hospital->slug.'/'.$doctorItem->slug)}}">
                                        <img src="{{asset($doctorItem->doctorImages[0]->image)}}" alt="{{$doctorItem->name}}"
                                        style="max-width: 100%; display: inline-block; vertical-align: middle;">
                                    </a>
                                @endif
                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{$doctorItem->type}}</p>
                                <h5 class="product-name">
                                    <a href="{{url('/collections/'.$doctorItem->hospital->slug.'/'.$doctorItem->slug)}}">
                                            {{$doctorItem->name_of_specialty}}
                                    </a>
                                </h5>
                                <h5 class="product-name">
                                    <a href="{{url('/collections/'.$doctorItem->hospital->slug.'/'.$doctorItem->slug)}}">
                                            {{$doctorItem->name}}
                                    </a>
                                </h5>
                                <div>
                                    <span>₴ {{$doctorItem->original_price}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No Doctor Available for {{$hospital->name}}</h4>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
