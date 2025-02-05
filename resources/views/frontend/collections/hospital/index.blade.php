@extends('layouts.app')
@section('title', 'All Hospitals')
@section('content')
<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4 stylized-title">You can choose a hospital:</h4>
            </div>
            @forelse ($hospitals as $hospitalItem)
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
        </div>
    </div>
</div>
@endsection
