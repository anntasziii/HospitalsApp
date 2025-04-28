<div class="main-navbar shadow-sm sticky-top">
    <div class="top-navbar" style="background-color: #4d88ff;">
        <div class="container-fluid">
            <div class="row" style="margin-left: 10px;">
                <div class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">
                    <h3 href="{{url('/')}}" style="letter-spacing: 1.5px;" class="brand-name">{{$appSetting->website_name ?? 'website name'}}</h3>
                </div>
                <div class="col-md-5 my-auto">
                    <form action="{{url('search')}}" method="GET" role="search">
                        <div class="input-group">
                            <input type="search" name="search" style="border-radius: 10px 0 0 10px;" value="{{Request::get('search')}}" placeholder="Search doctors and analysys" class="form-control" />
                            <button style="border-radius: 0 10px 10px 0" class="btn bg-white" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 my-auto">
                    <ul class="nav justify-content-end">

                        <li class="nav-item">
                            <a class="nav-link" href="{{url('cart')}}">
                                <i class="fa fa-list"></i> Referral (<livewire:frontend.cart.cart-count />)
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('wishlist')}}">
                                <i class="fa fa-heart"></i> Plans
                                (<livewire:frontend.wishlist-count />)
                            </a>
                        </li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">
                                        <svg viewBox="0 0 24 24" style="width: 25px; height: 25px" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20 12C20 7.58172 16.4183 4 12 4M12 20C14.5264 20 16.7792 18.8289 18.2454 17" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"></path> <path d="M4 12H14M14 12L11 9M14 12L11 15" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                        Login</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                        <svg fill="#ffffff" style="width: 25px; height: 25px" viewBox="0 -3 16 16" id="backup-cloud-16px" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path id="Path_169" data-name="Path 169" d="M30.854,8.646a.5.5,0,0,1-.708.708L28.5,7.707V10.5a.5.5,0,0,1-1,0V7.707L25.854,9.354a.5.5,0,0,1-.708-.708l2.5-2.5a.518.518,0,0,1,.163-.109.505.505,0,0,1,.382,0,.518.518,0,0,1,.163.109ZM36,10a3,3,0,0,1-3,3H22.5a2.5,2.5,0,0,1,0-5,2.46,2.46,0,0,1,.5.052V8a4.988,4.988,0,0,1,9.878-1A3,3,0,0,1,36,10Zm-1,0a1.984,1.984,0,0,0-2.436-1.948.5.5,0,0,1-.606-.44A3.988,3.988,0,0,0,24,8v.777a.5.5,0,0,1-.752.432A1.47,1.47,0,0,0,22.5,9a1.5,1.5,0,0,0,0,3H33A2,2,0,0,0,35,10Z" transform="translate(-20 -3)"></path> </g></svg>
                                        Register</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="min-width: 220px; border-radius: 12px;">
                                <li><a class="dropdown-item" href="{{url('profile')}}" style="padding: 10px 20px; border-radius: 8px;"><i class="fa fa-user"></i> Profile</a></li>
                                <li><a class="dropdown-item" href="{{url('orders')}}" style="padding: 10px 20px; "><i class="fa fa-list"></i> My orders</a></li>
                                <li><a class="dropdown-item" href="{{url('wishlist')}}" style="padding: 10px 20px;"><i class="fa fa-heart"></i> My wishlist</a></li>
                                <li><a class="dropdown-item" href="{{url('cart')}}" style="padding: 10px 20px;"><i class="fa fa-shopping-cart"></i> My chart</a></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                       style="padding: 10px 20px; border-radius: 8px;">
                                        <i class="fa fa-sign-out"></i> Sign out
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg" style="background-color: #e6eeff;">
        <div class="container-fluid">
            <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="#">
                Automobile spare parts
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul style="color: #002266;" class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a style="color: #002266; letter-spacing: 0.5px;" class="nav-link" href="{{url('/')}}">Main page</a>
                    </li>
                    <li class="nav-item">
                        <a style="color: #002266; letter-spacing: 0.5px;" class="nav-link" href="{{url('/hospitals')}}">Hospitals</a>
                    </li>
                    <li class="nav-item">
                        <a style="color: #002266; letter-spacing: 0.5px;" class="nav-link" href="{{url('/doctors-featured')}}">Doctors featured</a>
                    </li>
                    <li class="nav-item">
                        <a style="color: #002266; letter-spacing: 0.5px;" class="nav-link" href="{{url('/analysys-featured')}}">Analysys featured</a>
                    </li>
                    <li class="nav-item">
                        <a style="color: #002266; letter-spacing: 0.5px;" class="nav-link" href="{{url('/new-arrivals')}}">Hospiatls arrivals</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
