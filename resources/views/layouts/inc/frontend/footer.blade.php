<div>
    <div class="footer-area" style="background: #3366ff; color: white; padding-top:50px;">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-4">
                    <h4 class="footer-heading">{{$appSetting->website_name ?? 'website name'}}</h4>
                    <div class="footer-underline mb-4" style="border-bottom: 3px solid; width: 60%;"></div>
                    <p>
                        Booking appointments with doctors and ordering analyses through our application is simple and easy. You can browse through our list of recommended doctors and available analyses, choose the ones you need, and book appointments at your convenience
                    </p>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Quick search</h4>
                    <div class="footer-underline mb-4" style="border-bottom: 3px solid; width: 60%;"></div>
                    <div class="mb-2"><a href="" class="text-white">Main pagae</a></div>
                    <div class="mb-2"><a href="" class="text-white">About us</a></div>
                    <div class="mb-2"><a href="" class="text-white">Our contacts</a></div>
                    <div class="mb-2"><a href="" class="text-white">Blog</a></div>
                    <div class="mb-2"><a href="" class="text-white">One the map</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Get referral now</h4>
                    <div class="footer-underline mb-4" style="border-bottom: 3px solid; width: 60%;"></div>
                    <div class="mb-2"><a href="{{url('/hospitals')}}" class="text-white">Hospitals</a></div>
                    <div class="mb-2"><a href="{{url('/new-arrivals')}}" class="text-white">New hospitals</a></div>
                    <div class="mb-2"><a href="{{url('/doctors-featured')}}" class="text-white">Recommended doctors</a></div>
                    <div class="mb-2"><a href="{{url('/analysys-featured')}}" class="text-white">Recommended analyses</a></div>
                    <div class="mb-2"><a href="{{url('/cart')}}" class="text-white">Referral</a></div>
                </div>
                <div class="col-md-2">
                    <h4 class="footer-heading">Our contacts</h4>
                    <div class="footer-underline mb-4" style="border-bottom: 3px solid; width: 60%;"></div>
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
        <div class="container" style="padding-bottom: 10px; padding-top: 10px;">
            <div class="row">
                <div class="col-md-8">
                    <p class=""> &copy; 2025 - {{$appSetting->website_name ?? 'website name'}}</p>
                </div>
                <div class="col-md-4">
                    <div class="social-media">
                        Get Connected:
                        {{$appSetting->phone1 ?? 'phone1'}}
                        <a>
                            @if ($appSetting->facebook)
                                <a href="{{$appSetting->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a>
                            @endif
                            @if ($appSetting->twitter)
                                <a href="{{$appSetting->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>
                            @endif
                            @if ($appSetting->instagram)
                                <a href="{{$appSetting->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a>
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
