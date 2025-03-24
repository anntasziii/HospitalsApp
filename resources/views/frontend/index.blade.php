@extends('layouts.app')
@section('title', 'Home Page')
@section('content')

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
    <div class="carousel-inner">
        @foreach ($sliders as $key => $sliderItem )
            <div class="carousel-item {{$key == 0 ? 'active':''}}">
                @if($sliderItem->image)
                    <img src="{{asset("$sliderItem->image")}}" class="d-block w-100" alt="...">
                @endif
                <div class="carousel-caption d-none d-md-block">
                    <div class="custom-carousel-content">
                        <h1>{!! $sliderItem->title !!}</h1>
                        <p>{!! $sliderItem->description !!}</p>
                        <a href="/hospitals" class="btn btn-slider"
                            style="border-radius: 10px; width: 300px; background-color: #ccddff; color: ccddff;"
                            onmouseover="this.style.backgroundColor='#6699ff'"
                            onmouseout="this.style.backgroundColor='#ccddff'">
                            Choose a hospital
                            </a>
                    </div>
                </div>
            </div>
      @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                    <h4 class="mb-4 stylized-title">Welcome to the doctor's appointment and laboratory analysys system:</h4>
                <p>
                    Welcome to our online service for booking doctor appointments and laboratory tests – your one-stop destination
                    for managing your healthcare needs conveniently and efficiently. Whether you are a patient seeking professional
                    medical consultation or require accurate lab tests, we are here to assist you. Our platform understands the importance
                    of timely medical care and diagnostics, which is why we offer a seamless booking experience with trusted healthcare providers.
                    With a wide range of services available, we ensure that you receive high-quality medical attention from reliable professionals.
                </p>
            </div>
        </div>
    </div>
</div>
<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="color: #002b80">
                <h4>Trending Doctors:</h4>
                <div class="underline mb-4">________________</div>
            </div>
            @if($trendingDoctors)
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme four-carousel">
                        @foreach ($trendingDoctors as $doctorItem)
                            <div class="item">
                                <div class="product-card">
                                    <div class="product-card-img" style="width: 100%; height: 350px; text-align: center;">
                                        @if ($doctorItem->quantity > 0)
                                            <label class="stock bg-success">Appointment available</label>
                                        @else
                                            <label class="stock bg-danger">Appointment unavailable</label>
                                        @endif
                                        @if ($doctorItem->doctorImages->count() > 0)
                                            <a href="{{url('/collections/'.$doctorItem->hospital->slug.'/doctors/'.$doctorItem->slug)}}">
                                                <img src="{{asset($doctorItem->doctorImages[0]->image)}}" alt="{{$doctorItem->name}}"
                                                style="max-width: 100%; display: inline-block; vertical-align: middle; border-radius: 10px;">
                                            </a>
                                        @endif
                                    </div>
                                    <div class="product-card-body">
                                        <p class="product-brand">{{$doctorItem->type}}</p>
                                        <h5 class="product-name">
                                            <a href="{{url('/collections/'.$doctorItem->hospital->slug.'/doctors/'.$doctorItem->slug)}}">
                                                {{$doctorItem->name_of_specialty}}
                                            </a>
                                        </h5>
                                        <h5 class="product-name">
                                            <a href="{{url('/collections/'.$doctorItem->hospital->slug.'/doctors/'.$doctorItem->slug)}}">
                                                <span style="color: #000000; font-size: 18px;">{{$doctorItem->name}} {{$doctorItem->surname}}</span>
                                            </a>
                                        </h5>
                                        <div>
                                            <span>
                                                @if ($doctorItem->original_price == 0)
                                                    <span style="color: green; font-size: 20px;">Free</span>
                                                @else
                                                    ₴{{$doctorItem->original_price}}
                                                @endif
                                            </span>
                                            @if($doctorItem->type == 'Sale')
                                                <span style="color: red; font-size: 20px; margin-left: 10px;"> Sale 50% </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>No Doctors Available</h4>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="color: #002b80">
                <h4>Trending Analyses:</h4>
                <div class="underline mb-4">________________</div>
            </div>
            @if($trendingAnalyses)
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme four-carousel">
                        @foreach ($trendingAnalyses as $analysisItem)
                            <div class="item">
                                <div class="product-card">
                                    <div class="product-card-img" style="width: 100%; height: 350px; text-align: center;">
                                        @if ($analysisItem->quantity > 0)
                                            <label class="stock bg-success">Appointment available</label>
                                        @else
                                            <label class="stock bg-danger">Appointment unavailable</label>
                                        @endif
                                        @if ($analysisItem->analysisImages->count() > 0)
                                            <a href="{{url('/collections/'.$analysisItem->hospital->slug.'/analyses/'.$analysisItem->slug)}}">
                                                <img src="{{asset($analysisItem->analysisImages[0]->image)}}" alt="{{$analysisItem->name}}"
                                                style="max-width: 100%; display: inline-block; vertical-align: middle; border-radius: 10px;">
                                            </a>
                                        @endif
                                    </div>
                                    <div class="product-card-body">
                                        <p class="product-brand">{{$analysisItem->type}}</p>
                                        <h5 class="product-name">
                                            <a href="{{url('/collections/'.$analysisItem->hospital->slug.'/analyses/'.$analysisItem->slug)}}">
                                                {{$analysisItem->name_of_specialty}}
                                            </a>
                                        </h5>
                                        <h5 class="product-name">
                                            <a href="{{url('/collections/'.$analysisItem->hospital->slug.'/analyses/'.$analysisItem->slug)}}">
                                                <span style="color: #000000; font-size: 18px;">{{$analysisItem->name}} {{$analysisItem->surname}}</span>
                                            </a>
                                        </h5>
                                        <div>
                                            <span>
                                                @if ($analysisItem->original_price == 0)
                                                    <span style="color: green; font-size: 20px;">Free</span>
                                                @else
                                                    ₴{{$analysisItem->original_price}}
                                                @endif
                                            </span>
                                            @if($analysisItem->type == 'Sale')
                                                <span style="color: red; font-size: 20px; margin-left: 10px;"> Sale 50% </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>No Doctors Available</h4>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

{{-- <div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Новинки
                    <a href="{{url('new-arrivals')}}" class="btn btn-primary float-end">Переглянути більше</a>
                </h4>
                <div class="underline mb-4">________________</div>
            </div>
            @if($newArrivalsProducts)
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme four-carousel">
                        @foreach ($newArrivalsProducts as $doctorItem)
                            <div class="item">
                                <div class="doctor-card">
                                    <div class="doctor-card-img" style="width: 100%; height: 250px; text-align: center;">
                                        <label class="stock bg-success">Новинка</label>
                                        @if ($doctorItem->doctorImages->count()>0)
                                            <a href="{{url('/collections/'.$doctorItem->category->slug.'/'.$doctorItem->slug)}}">
                                                <img src="{{asset($doctorItem->doctorImages[0]->image)}}" alt="{{$doctorItem->name}}"
                                                style="max-width: 100%; max-height: 100%; display: inline-block; vertical-align: middle;">
                                            </a>
                                        @endif
                                    </div>
                                    <div class="doctor-card-body">
                                        <p class="doctor-brand">{{$doctorItem->brand}}</p>
                                        <h5 class="doctor-name">
                                        <a href="{{url('/collections/'.$doctorItem->category->slug.'/'.$doctorItem->slug)}}">
                                                {{$doctorItem->name}}
                                        </a>
                                        </h5>
                                        <div>
                                            <span class="selling-price">₴{{$doctorItem->selling_price}}</span>
                                            <span class="original-price">₴{{$doctorItem->original_price}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>No New Arrivals Available</h4>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Рекомендовані товари
                    <a href="{{url('featured-doctors')}}"  class="btn btn-primary float-end">Переглянути більше</a>
                </h4>
                <div class="underline mb-4">________________</div>
            </div>
            @if($featuredProducts)
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme four-carousel">
                        @foreach ($featuredProducts as $doctorItem)
                            <div class="item">
                                <div class="doctor-card">
                                    <div class="doctor-card-img" style="width: 100%; height: 250px; text-align: center;">
                                        <label class="stock bg-success">Рекомендуємо</label>
                                        @if ($doctorItem->doctorImages->count()>0)
                                            <a href="{{url('/collections/'.$doctorItem->category->slug.'/'.$doctorItem->slug)}}">
                                                <img src="{{asset($doctorItem->doctorImages[0]->image)}}" alt="{{$doctorItem->name}}"
                                                style="max-width: 100%; max-height: 100%; display: inline-block; vertical-align: middle;">
                                            </a>
                                        @endif
                                    </div>
                                    <div class="doctor-card-body">
                                        <p class="doctor-brand">{{$doctorItem->brand}}</p>
                                        <h5 class="doctor-name">
                                        <a href="{{url('/collections/'.$doctorItem->category->slug.'/'.$doctorItem->slug)}}">
                                                {{$doctorItem->name}}
                                        </a>
                                        </h5>
                                        <div>
                                            <span class="selling-price">₴{{$doctorItem->selling_price}}</span>
                                            <span class="original-price">₴{{$doctorItem->original_price}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>No Featured Products Available</h4>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div> --}}
@endsection
@section('script')
<script>
    $('.four-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots: true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>

@endsection
