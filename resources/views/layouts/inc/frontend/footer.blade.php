<div>
    <div class="footer-area">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-3">
                    <h4 class="footer-heading">{{$appSetting->website_name ?? 'website name'}}</h4>
                    <div class="footer-underline"></div>
                    <p>
                        Здійснювати покупки в нашому інтернет-магазині зручно і без проблем. Ви можете переглядати
                          наш повний каталог, що містить широкий вибір запчастин для різних марок
                           і моделей.
                    </p>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Швидкий пошук</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="" class="text-white">Головна</a></div>
                    <div class="mb-2"><a href="" class="text-white">Про нас</a></div>
                    <div class="mb-2"><a href="" class="text-white">Контакти</a></div>
                    <div class="mb-2"><a href="" class="text-white">Блог</a></div>
                    <div class="mb-2"><a href="" class="text-white">На карті</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Придбати зараз</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="{{url('/collections')}}" class="text-white">Марки авто</a></div>
                    <div class="mb-2"><a href="{{url('/')}}" class="text-white">Трендові продукти</a></div>
                    <div class="mb-2"><a href="{{url('/new-arrivals')}}" class="text-white">Новинки</a></div>
                    <div class="mb-2"><a href="{{url('/featured-products')}}" class="text-white">Рекомендовані продукти</a></div>
                    <div class="mb-2"><a href="{{url('/cart')}}" class="text-white">Корзина</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Наші контакти</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2">
                        <p>
                            <i class="fa fa-map-marker"></i> {{$appSetting->address ?? 'address'}}
                        </p>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-phone"></i> {{$appSetting->phone1 ?? 'phone1'}}
                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-envelope"></i> {{$appSetting->email1 ?? 'email1'}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class=""> &copy; 2023 - {{$appSetting->website_name ?? 'website name'}}</p>
                </div>
                <div class="col-md-4">
                    <div class="social-media">
                        Get Connected:
                        {{$appSetting->phone1 ?? 'phone1'}}
                        @if ($appSetting->facebook)
                            <a href="{{$appSetting->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a>
                        @endif
                        @if ($appSetting->twitter)
                            <a href="{{$appSetting->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>
                        @endif
                        @if ($appSetting->instagram)
                            <a href="{{$appSetting->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a>
                        @endif
                        @if ($appSetting->youtube)
                            <a href="{{$appSetting->youtube}}" target="_blank"><i class="fa fa-youtube"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
