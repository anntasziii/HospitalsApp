@extends('layouts.app')
@section('title', 'Recommended Analyses')
@section('content')
<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4 stylized-title">Recommended Analyses:</h4>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-9">
                    <div class="row">
                        @forelse ($featuredAnalyses as $analysisItem)
                            <div class="col-md-4">
                                <div class="product-card">
                                    <div class="product-card-img" style="width: 100%; height: 350px; text-align: center;">
                                        @if ($analysisItem->quantity > 0)
                                            <label class="stock bg-success">Appointment available</label>
                                        @else
                                            <label class="stock bg-danger">Appointment unavailable</label>
                                        @endif
                                        @if ($analysisItem->analysisImages->count()>0)
                                            <a href="{{url('/collections/'.$analysisItem->hospital->slug.'/analyses/'.$analysisItem->slug)}}">
                                                <img src="{{asset($analysisItem->analysisImages[0]->image)}}" alt="{{$analysisItem->name}}"
                                                style="max-width: 100%; display: inline-block; vertical-align: middle;">
                                            </a>
                                        @endif
                                    </div>
                                    <div class="product-card-body">
                                        <p class="product-brand">{{$analysisItem->type}}</p>
                                        <h5 class="product-name">
                                            <a href="{{url('/collections/'.$analysisItem->hospital->slug.'/analyses/'.$analysisItem->slug)}}">
                                                {{$analysisItem->name}}
                                            </a>
                                        </h5>
                                        <div>
                                            <span>₴ {{$analysisItem->original_price}}</span>
                                            @if($analysisItem->type == 'Sale')
                                                <span style="color: red; font-size: 20px; margin-left: 10px;"> Sale 50% </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-12">
                                <div class="p-2">
                                    <h5 style="color: #002266">No Analysis Available for {{$hospital->name}}</h5>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
