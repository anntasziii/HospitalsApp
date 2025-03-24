@extends('layouts.app')
@section('title', 'New Arrivals Hospitals')
@section('content')
<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4 stylized-title">Opening of new hospitals:</h4>
            </div>
            @forelse ($newArrivalsHospitals as $hospitalItem)
            <div class="col-6 col-md-3">
                <div class="hospital-card">
                    <a href="{{url('/collections/'.$hospitalItem->slug)}}">
                        <div class="hospital-card-img" style="width: 100%; height: 200px; text-align: center;">
                            <img src="{{asset("$hospitalItem->image")}}" style="max-width: 100%; max-height: 100%; display: inline-block; vertical-align: middle;" alt="Laptop">
                        </div>
                        <div class="hospital-card-body">
                            <h5>{{$hospitalItem->name}}</h5>
                        </div>
                    </a>
                </div>
            </div>
            @empty
                <div class="col-md-12">
                    <h5>No Hospitals Available </h5>
                </div>
            @endforelse
                <div class="text-center">
                    <a href="{{url('hospitals')}}" class="btn btn-sm text-white d-flex align-items-center justify-content-center mx-auto"
                       style="height: 50px; width: 300px; border-radius: 15px; background-color: #4d88ff; color: white; font-size: 16px">
                        View more hospitals
                    </a>
                </div>
        </div>
    </div>
</div>
@endsection
