@extends('layouts.app')
@section('title', 'My Order Details')
@section('content')
<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 shopping-cart">
                <div class="shadow bg-white p-3 cart-item">
                    <h4 style="color: #002b80; letter-spacing: 1px;">
                        My Referral Details:
                            <a href="{{url('orders')}}" class="btn btn-danger btn-sm text-white float-end" style="width: 150px; border-radius: 10px;">
                                <svg viewBox="0 0 24 24"  width="20" height="20" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier">
                                    <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9.00002 15.3802H13.92C15.62 15.3802 17 14.0002 17 12.3002C17 10.6002 15.62 9.22021 13.92 9.22021H7.15002" stroke="#FFFFFF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M8.57 10.7701L7 9.19012L8.57 7.62012" stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g>
                                </svg>
                                Back
                            </a>
                    </h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Referral Details:</h5>
                            <hr>
                            <h6><b>Referral Id:</b> {{$order->id}}</h6>
                            <h6><b>Referraled Date:</b> {{$order->created_at->format('d-m-Y h:i A')}}</h6>
                            <h6><b>Payment Mode:</b> {{$order->payment_mode}}</h6>
                            <h6 class="text-success mt-4">
                                <b>Referral Status Message:</b> <span class="text-uppercase">{{$order->status_message}}</span>
                            </h6>
                        </div>
                        <div class="col-md-6">
                                <h5>User Details:</h5>
                                <hr>
                                <h6><b>Full Name:</b> {{$order->fullname}}</h6>
                                <h6><b>Email Id:</b> {{$order->email}}</h6>
                                <h6><b>Phone:</b> {{$order->phone}}</h6>
                                <h6><b>Comment:</b> {{$order->comment}}</h6>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Date & Time</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->orderItems as $orderItem)
                                    <tr style="font-weight: normal; height: 70px; vertical-align: middle;">
                                        <td>{{ $orderItem->id }}</td>

                                        <td>
                                            @if ($orderItem->doctor)
                                                {{ $orderItem->doctor->name }} {{ $orderItem->doctor->surname }} - {{ $orderItem->doctor->name_of_specialty }} (Лікар)
                                            @elseif ($orderItem->analysis)
                                                {{ $orderItem->analysis->name }}
                                            @else
                                                <span class="text-danger">No Analyses and Doctors added to Plans</span>
                                            @endif
                                        </td>

                                        <td>
                                            @if ($orderItem->doctor && $orderItem->doctor->doctorImages->isNotEmpty())
                                                <img style="border-radius: 10px" src="{{ asset($orderItem->doctor->doctorImages->first()->image) }}" width="70" height="100" alt="Doctor Image">
                                            @elseif ($orderItem->analysis && $orderItem->analysis->analysisImages->isNotEmpty())
                                                <img style="border-radius: 10px" src="{{ asset($orderItem->analysis->analysisImages->first()->image) }}" width="70" height="100" alt="Analysis Image">
                                            @else
                                                <span class="text-danger">No image available</span>
                                            @endif
                                        </td>

                                        <td>
                                            @if ($orderItem->doctorTime)
                                                {{ $orderItem->doctorTime->time->name }}
                                            @elseif ($orderItem->analysisTime && $orderItem->analysisTime->time)
                                                {{ $orderItem->analysisTime->time->name }}
                                            @else
                                                <span class="text-danger">No time added</span>
                                            @endif
                                        </td>


                                        <td>
                                            <label class="price"
                                                style="{{ $orderItem->price == 0 ? 'color: green; font-weight: bold; font-size: 18px; font-weight: normal; letter-spacing: 1px;' : 'font-size: 18px; letter-spacing: 0.5px; font-weight: normal;' }}">
                                                {{ $orderItem->price == 0 ? 'Free' : '₴' . $orderItem->price }}
                                            </label>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
