@extends('layouts.app')
@section('title', 'Search Hospitals')
@section('content')
<div class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h4 class="mb-4 stylized-title">Results of the search for hospitals:</h4>
            </div>
            @forelse ($searchHospital as $hospitalItem)
            <div class="col-6 col-md-3">
                <div class="hospital-card" style="height: 320px">
                    <a href="{{url('/collections/'.$hospitalItem->slug)}}">
                        <div class="hospital-card-img" style="width: 100%; height: 200px; text-align: center;">
                            <img src="{{ asset($hospitalItem->image) }}" style="max-width: 100%; max-height: 100%; display: inline-block; vertical-align: middle;" alt="{{ $hospitalItem->name }}">
                        </div>
                        <div class="hospital-card-body">
                            <h5>{{$hospitalItem->name}}</h5>
                            <div class="mt-2"><b>City:</b> {{$hospitalItem->sity}}</div>
                            <div><b>Region:</b> {{$hospitalItem->region}}</div>
                        </div>
                    </a>
                </div>
            </div>
            @empty
                <div class="col-md-12 text-center">
                    <h5>Hospitals not found, try to change the request</h5>
                </div>
            @endforelse
            <div class="col-md-10 text-center mt-4">
                {{ $searchHospital->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
