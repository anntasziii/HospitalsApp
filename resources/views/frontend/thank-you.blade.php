@extends('layouts.app')
@section('title', 'Thank You for Shopping')
@section('content')
<div class="py-3 pyt-md-4" style="margin-bottom: 320px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="p-4 shadow bg-white text-center">
                    <h3 style="margin-bottom: 40px">We are waiting for you in our medical facility. We wish you good health!</h3>
                    <a href="{{url('collections')}}" class="btn btn-primary">Go to hospitals</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
