<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container" style="margin-bottom: 200px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">
                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 style="font-size: 24px"><b>ANALYSES</b></h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>PRICE</h4>
                                </div>
                                <div class="col-md-4">
                                    <h4>DELETE FROM PLANS</h4>
                                </div>
                            </div>
                        </div>
                        @forelse ($wishlist as $wishlistItem)
                            @if ($wishlistItem->analysis)
                                <div class="cart-item">
                                    <div class="row">
                                        <div class="col-md-6 my-auto">
                                            <a href="{{url('collections/'.$wishlistItem->analysis->hospital->slug.'/analyses/'.$wishlistItem->analysis->slug)}}">
                                                <label class="analysis-name">
                                                    <img src="{{$wishlistItem->analysis->analysisImages[0]->image}}"
                                                        style="width: 100px; height: 130px; border-radius: 10px;"
                                                        alt="{{$wishlistItem->analysis->name}}" />
                                                        <a class="nameItemPlans">{{$wishlistItem->analysis->name}}</a>
                                                </label>
                                            </a>
                                        </div>
                                        <div class="col-md-2 my-auto">
                                            <label class="price"
                                                style="{{ $wishlistItem->analysis->original_price == 0 ? 'color: green; font-weight: bold; font-size: 18px; font-weight: normal; letter-spacing: 1px;' : 'font-size: 18px; letter-spacing: 0.5px; font-weight: normal;' }}">
                                                {{ $wishlistItem->analysis->original_price == 0 ? 'Free' : '₴' . $wishlistItem->analysis->original_price }}
                                            </label>
                                        </div>
                                        <div class="col-md-4 col-12 my-auto">
                                            <div class="remove">
                                                <button type="button" wire:click="removeWishlistItem({{$wishlistItem->id}})" class="btnDelete btn btn-sm">
                                                    <span wire:loading.remove wire:target="removeWishlistItem({{$wishlistItem->id}})">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 50 50">
                                                            <path fill="white" d="M 21 0 C 19.355469 0 18 1.355469 18 3 L 18 5 L 10.1875 5 C 10.0625 4.976563 9.9375 4.976563 9.8125 5 L 8 5 C 7.96875 5 7.9375 5 7.90625 5 C 7.355469 5.027344 6.925781 5.496094 6.953125 6.046875 C 6.980469 6.597656 7.449219 7.027344 8 7 L 9.09375 7 L 12.6875 47.5 C 12.8125 48.898438 14.003906 50 15.40625 50 L 34.59375 50 C 35.996094 50 37.1875 48.898438 37.3125 47.5 L 40.90625 7 L 42 7 C 42.359375 7.003906 42.695313 6.816406 42.878906 6.503906 C 43.058594 6.191406 43.058594 5.808594 42.878906 5.496094 C 42.695313 5.183594 42.359375 4.996094 42 5 L 32 5 L 32 3 C 32 1.355469 30.644531 0 29 0 Z M 21 2 L 29 2 C 29.5625 2 30 2.4375 30 3 L 30 5 L 20 5 L 20 3 C 20 2.4375 20.4375 2 21 2 Z M 11.09375 7 L 38.90625 7 L 35.3125 47.34375 C 35.28125 47.691406 34.910156 48 34.59375 48 L 15.40625 48 C 15.089844 48 14.71875 47.691406 14.6875 47.34375 Z M 18.90625 9.96875 C 18.863281 9.976563 18.820313 9.988281 18.78125 10 C 18.316406 10.105469 17.988281 10.523438 18 11 L 18 44 C 17.996094 44.359375 18.183594 44.695313 18.496094 44.878906 C 18.808594 45.058594 19.191406 45.058594 19.503906 44.878906 C 19.816406 44.695313 20.003906 44.359375 20 44 L 20 11 C 20.011719 10.710938 19.894531 10.433594 19.6875 10.238281 C 19.476563 10.039063 19.191406 9.941406 18.90625 9.96875 Z M 24.90625 9.96875 C 24.863281 9.976563 24.820313 9.988281 24.78125 10 C 24.316406 10.105469 23.988281 10.523438 24 11 L 24 44 C 23.996094 44.359375 24.183594 44.695313 24.496094 44.878906 C 24.808594 45.058594 25.191406 45.058594 25.503906 44.878906 C 25.816406 44.695313 26.003906 44.359375 26 44 L 26 11 C 26.011719 10.710938 25.894531 10.433594 25.6875 10.238281 C 25.476563 10.039063 25.191406 9.941406 24.90625 9.96875 Z M 30.90625 9.96875 C 30.863281 9.976563 30.820313 9.988281 30.78125 10 C 30.316406 10.105469 29.988281 10.523438 30 11 L 30 44 C 29.996094 44.359375 30.183594 44.695313 30.496094 44.878906 C 30.808594 45.058594 31.191406 45.058594 31.503906 44.878906 C 31.816406 44.695313 32.003906 44.359375 32 44 L 32 11 C 32.011719 10.710938 31.894531 10.433594 31.6875 10.238281 C 31.476563 10.039063 31.191406 9.941406 30.90625 9.96875 Z"></path>
                                                        </svg>
                                                        Delete
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <h4 style="color: red; margin-left: 10px; font-size: 20px;">No Analyses added to Plans</h4>
                        @endforelse
                    </div>
                    <div class="shopping-cart mt-5">
                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 style="font-size: 24px"><b>DOCTORS</b></h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>PRICE</h4>
                                </div>
                                <div class="col-md-4">
                                    <h4>DELETE FROM PLANS</h4>
                                </div>
                            </div>
                        </div>
                        @forelse ($wishlist as $wishlistItem)
                            @if ($wishlistItem->doctor)
                                <div class="cart-item">
                                    <div class="row">
                                        <div class="col-md-6 my-auto">
                                            <a href="{{url('collections/'.$wishlistItem->doctor->hospital->slug.'/doctors/'.$wishlistItem->doctor->slug)}}">
                                                <label class="doctor-name">
                                                    <img src="{{$wishlistItem->doctor->doctorImages[0]->image}}"
                                                        style="width: 100px; height: 130px; border-radius: 10px;"
                                                        alt="{{$wishlistItem->doctor->name}}" />
                                                    <a class="nameItemPlans">{{$wishlistItem->doctor->name_of_specialty}} - {{$wishlistItem->doctor->name}} {{$wishlistItem->doctor->surname}}</a>
                                                </label>
                                            </a>
                                        </div>
                                        <div class="col-md-2 my-auto">
                                            <label class="price"
                                                style="{{ $wishlistItem->doctor->original_price == 0 ? 'color: green; font-weight: bold; font-size: 18px; font-weight: normal; letter-spacing: 1px;' : 'font-size: 18px; letter-spacing: 0.5px; font-weight: normal;' }}">
                                                {{ $wishlistItem->doctor->original_price == 0 ? 'Free' : '₴' . $wishlistItem->doctor->original_price }}
                                            </label>
                                        </div>
                                        <div class="col-md-4 col-12 my-auto">
                                            <div class="remove">
                                                <button type="button" wire:click="removeWishlistItem({{$wishlistItem->id}})" class="btnDelete btn btn-sm">
                                                    <span wire:loading.remove wire:target="removeWishlistItem({{$wishlistItem->id}})">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 50 50">
                                                            <path fill="white" d="M 21 0 C 19.355469 0 18 1.355469 18 3 L 18 5 L 10.1875 5 C 10.0625 4.976563 9.9375 4.976563 9.8125 5 L 8 5 C 7.96875 5 7.9375 5 7.90625 5 C 7.355469 5.027344 6.925781 5.496094 6.953125 6.046875 C 6.980469 6.597656 7.449219 7.027344 8 7 L 9.09375 7 L 12.6875 47.5 C 12.8125 48.898438 14.003906 50 15.40625 50 L 34.59375 50 C 35.996094 50 37.1875 48.898438 37.3125 47.5 L 40.90625 7 L 42 7 C 42.359375 7.003906 42.695313 6.816406 42.878906 6.503906 C 43.058594 6.191406 43.058594 5.808594 42.878906 5.496094 C 42.695313 5.183594 42.359375 4.996094 42 5 L 32 5 L 32 3 C 32 1.355469 30.644531 0 29 0 Z M 21 2 L 29 2 C 29.5625 2 30 2.4375 30 3 L 30 5 L 20 5 L 20 3 C 20 2.4375 20.4375 2 21 2 Z M 11.09375 7 L 38.90625 7 L 35.3125 47.34375 C 35.28125 47.691406 34.910156 48 34.59375 48 L 15.40625 48 C 15.089844 48 14.71875 47.691406 14.6875 47.34375 Z M 18.90625 9.96875 C 18.863281 9.976563 18.820313 9.988281 18.78125 10 C 18.316406 10.105469 17.988281 10.523438 18 11 L 18 44 C 17.996094 44.359375 18.183594 44.695313 18.496094 44.878906 C 18.808594 45.058594 19.191406 45.058594 19.503906 44.878906 C 19.816406 44.695313 20.003906 44.359375 20 44 L 20 11 C 20.011719 10.710938 19.894531 10.433594 19.6875 10.238281 C 19.476563 10.039063 19.191406 9.941406 18.90625 9.96875 Z M 24.90625 9.96875 C 24.863281 9.976563 24.820313 9.988281 24.78125 10 C 24.316406 10.105469 23.988281 10.523438 24 11 L 24 44 C 23.996094 44.359375 24.183594 44.695313 24.496094 44.878906 C 24.808594 45.058594 25.191406 45.058594 25.503906 44.878906 C 25.816406 44.695313 26.003906 44.359375 26 44 L 26 11 C 26.011719 10.710938 25.894531 10.433594 25.6875 10.238281 C 25.476563 10.039063 25.191406 9.941406 24.90625 9.96875 Z M 30.90625 9.96875 C 30.863281 9.976563 30.820313 9.988281 30.78125 10 C 30.316406 10.105469 29.988281 10.523438 30 11 L 30 44 C 29.996094 44.359375 30.183594 44.695313 30.496094 44.878906 C 30.808594 45.058594 31.191406 45.058594 31.503906 44.878906 C 31.816406 44.695313 32.003906 44.359375 32 44 L 32 11 C 32.011719 10.710938 31.894531 10.433594 31.6875 10.238281 C 31.476563 10.039063 31.191406 9.941406 30.90625 9.96875 Z"></path>
                                                        </svg>
                                                        Delete
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <h4 style="color: red; margin-left: 10px; font-size: 20px;">No Doctors added to Plans</h4>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
