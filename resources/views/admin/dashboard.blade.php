@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        @if(session('message'))
            <h6 class="alert alert-success">{{ session('message') }}</h6>
        @endif
        <div class="me-md-3 me-xl-5">
            <h1 style="color: #002266; letter-spacing: 1px;">ADMIN PANEL:</h1>
            <p class="mb-md-0" style="font-size: 16px">Hospital system analytics for administrators</p>
            <hr>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card card-body text-white mb-3 card-admin card-admin-1">
                    <label class="fw-bold">Total Referrals:
                        <span style="color: white; font-size: 26px;">{{$totalOrder}}</span>
                    </label>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{url('admin/orders')}}" class="text-white text-view">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body text-white mb-3 card-admin card-admin-2">
                    <label class="fw-bold">Today Referrals:
                        <span style="color: white; font-size: 26px;">{{$todayOrder}}</span>
                    </label>
                    <a href="{{url('admin/orders')}}" class="text-white text-view">View</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body text-white mb-3 card-admin card-admin-3">
                    <label class="fw-bold">This Month Referrals:
                        <span style="color: white; font-size: 26px;">{{$totalMonthOrder}}</span>
                    </label>
                    <a href="{{url('admin/orders')}}" class="text-white text-view">View</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body text-white mb-3 card-admin card-admin-4">
                    <label class="fw-bold">This Year Referrals:
                        <span style="color: white; font-size: 26px;">{{$totalYearOrder}}</span>
                    </label>
                    <a href="{{url('admin/orders')}}" class="text-white text-view">View</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card card-body text-white mb-3 card-admin card-admin-1">
                    <label class="fw-bold">Total Doctors:
                        <span style="color: white; font-size: 26px;">{{$totalDoctors}}</span>
                    </label>
                    <a href="{{url('admin/doctors')}}" class="text-white text-view">View</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body text-white mb-3 card-admin card-admin-2">
                    <label class="fw-bold"> Total Analyses:
                        <span style="color: white; font-size: 26px;">{{$totalAnalyses}}</span>
                    </label>
                    <a href="{{url('admin/analyses')}}" class="text-white text-view">View</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body text-white mb-3 card-admin card-admin-3">
                    <label class="fw-bold">Total Hospitals:
                        <span style="color: white; font-size: 26px;">{{$totalHospitals}}</span>
                    </label>
                    <a href="{{url('admin/hospital')}}" class="text-white text-view">View</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body text-white mb-3 card-admin card-admin-4">
                    <label class="fw-bold">Total Types:
                        <span style="color: white; font-size: 26px;">{{$totalTypes}}</span>
                    </label>
                    <a href="{{url('admin/types')}}" class="text-white text-view">View</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card card-body text-white mb-3 card-admin card-admin-1">
                    <label class="fw-bold">Total Registered Persons:
                        <span style="color: white; font-size: 26px;">{{$totalAllUsers}}</span>
                    </label>
                    <a href="{{url('admin/users')}}" class="text-white text-view">View</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body text-white mb-3 card-admin card-admin-2">
                    <label class="fw-bold">Total User:
                        <span style="color: white; font-size: 26px;">{{$totalUsers}}</span>
                    </label>
                    <a href="{{url('admin/users')}}" class="text-white text-view">View</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body text-white mb-3 card-admin card-admin-3">
                    <label class="fw-bold">Total Admin:
                        <span style="color: white; font-size: 26px;">{{$totalAdmin}}</span>
                    </label>
                    <a href="{{url('admin/users')}}" class="text-white text-view">View</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body text-white mb-3 card-admin card-admin-4">
                    <label class="fw-bold">Total Sliders:
                        <span style="color: white; font-size: 26px;">{{$totalSliders}}</span>
                    </label>
                    <a href="{{url('admin/sliders')}}" class="text-white text-view">View</a>
                </div>
            </div>
        </div>
        <hr>
    </div>
  </div>
@endsection

