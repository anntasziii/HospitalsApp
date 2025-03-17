@extends('layouts.app')
@section('title', 'Thank You for using MedBook')
@section('content')
<div class="py-3 pyt-md-4" style="margin-bottom: 320px;">
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12 shopping-cart">
                <div class="p-4 shadow bg-white text-center cart-item">
                    <h3 style="margin-bottom: 40px; color: #002b80;">We are waiting for you in our medical institutions. We wish you good health!</h3>
                    <a href="{{url('hospitals')}}" class="btn mb-4" style="background-color: #4d88ff; color: white; border-radius: 10px; font-weight: normal; width: 300px;">Serarch hospitals</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
