@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        @if(session('message'))
            <h6 class="alert alert-success">{{ session('message') }}</h6>
        @endif
        <div class="me-md-3 me-xl-5">
            <h2>ADMIN PANEL</h2>
            <p class="mb-md-0" style="font-size: 16px">Hospital system analytics for administrators</p>
            <hr>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card card-body text-white mb-3 card-admin card-admin-1">
                    <label class="fw-bold">Total Orders</label>
                    {{-- <h1>{{$totalOrder}}</h1> --}}
                    <a href="{{url('admin/orders')}}" class="text-white text-view">View</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body text-white mb-3 card-admin card-admin-2">
                    <label class="fw-bold">Today Orders</label>
                    {{-- <h1>{{$todayOrder}}</h1> --}}
                    <a href="{{url('admin/orders')}}" class="text-white text-view">View</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body text-white mb-3 card-admin card-admin-3">
                    <label class="fw-bold">This Month Orders</label>
                    {{-- <h1>{{$totalMonthOrder}}</h1> --}}
                    <a href="{{url('admin/orders')}}" class="text-white text-view">View</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body text-white mb-3 card-admin card-admin-4">
                    <label class="fw-bold">Year Orders</label>
                    {{-- <h1>{{$totalYearOrder}}</h1> --}}
                    <a href="{{url('admin/orders')}}" class="text-white text-view">View</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card card-body text-white mb-3 card-admin card-admin-1">
                    <label class="fw-bold">Total Products</label>
                    {{-- <h1>{{$totalProducts}}</h1> --}}
                    <a href="{{url('admin/products')}}" class="text-white text-view">View</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body text-white mb-3 card-admin card-admin-2">
                    <label class="fw-bold">
                        Total Hospitals
                    </label>
                    {{-- <h1>{{$totalCategories}}</h1> --}}
                    <a href="{{url('admin/hospital')}}" class="text-white text-view">View</a>


                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body text-white mb-3 card-admin card-admin-3">
                    <label class="fw-bold">Total Brands</label>
                    {{-- <h1>{{$totalBrands}}</h1> --}}
                    <a href="{{url('admin/brands')}}" class="text-white text-view">View</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body text-white mb-3 card-admin card-admin-4">
                    <label class="fw-bold">Total Times</label>
                    {{-- <h1>{{$totalTimes}}</h1> --}}
                    <a href="{{url('admin/times')}}" class="text-white text-view">View</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card card-body text-white mb-3 card-admin card-admin-1">
                    <label class="fw-bold">All Users</label>
                    {{-- <h1>{{$totalAllUsers}}</h1> --}}
                    <a href="{{url('admin/users')}}" class="text-white text-view">View</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body text-white mb-3 card-admin card-admin-2">
                    <label class="fw-bold">Total User</label>
                    {{-- <h1>{{$totalUser}}</h1> --}}
                    <a href="{{url('admin/users')}}" class="text-white text-view">View</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body text-white mb-3 card-admin card-admin-3">
                    <label class="fw-bold">Total Admin</label>
                    {{-- <h1>{{$totalAdmin}}</h1> --}}
                    <a href="{{url('admin/users')}}" class="text-white text-view">View</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body text-white mb-3 card-admin card-admin-4">
                    <label class="fw-bold">Total Sliders</label>
                    {{-- <h1>{{$totalSliders}}</h1> --}}
                    <a href="{{url('admin/sliders')}}" class="text-white text-view">View</a>
                </div>
            </div>
        </div>
        <hr>
    </div>
  </div>
@endsection

