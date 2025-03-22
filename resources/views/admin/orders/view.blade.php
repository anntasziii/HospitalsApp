@extends('layouts.admin')
@section('title', 'Referral Details')
@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success mb-3">{{ session('message') }}</div>
        @endif
        <div class="card" style="border-radius: 10px; padding-top: 10px;">
            <div class="card-header header-admin">
                <h3 style="color: #002266">REFERRALS DETAILS:</h3>
            </div>
            <div class="card-body">
                <h4 style="color: #002266">
                    <i class="fa fa-shopping-cart text-dark"></i> You can choose option:
                    <a href="{{ url('admin/orders') }}" class="btn btn-danger btn-sm text-white d-flex float-end align-items-center justify-content-center" style="width: 150px; height: 50px; border-radius: 10px;">
                        <svg viewBox="0 0 24 24"  width="20" height="20" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier">
                            <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9.00002 15.3802H13.92C15.62 15.3802 17 14.0002 17 12.3002C17 10.6002 15.62 9.22021 13.92 9.22021H7.15002" stroke="#FFFFFF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M8.57 10.7701L7 9.19012L8.57 7.62012" stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g>
                        </svg>
                        <p class="mt-2" style="margin-left: 5px">Back</p>
                </a>
                    <a href="{{ url('admin/invoice/'.$order->id.'/generate') }}"
                        class="btn btn-sm float-end mx-1 text-white d-flex align-items-center justify-content-center"
                        style="height: 50px; background-color: #6699ff; border-radius: 10px; font-size: 16px">
                        Download Referral
                     </a>

                    <a href="{{ url('admin/invoice/'.$order->id) }}" target="_blank"
                        class="btn btn-sm float-end mx-1 text-white d-flex align-items-center justify-content-center"
                        style="height: 50px; background-color: #99bbff; border-radius: 10px; font-size: 16px">
                        View Referral
                    </a>
                    <a href="{{ url('admin/invoice/'.$order->id.'/mail') }}"
                        class="btn btn-sm float-end mx-1 text-white d-flex align-items-center justify-content-center"
                        style="height: 50px; background-color: #6699ff; border-radius: 10px; font-size: 16px">
                        Send Referral on Email
                    </a>
                </h4>
                <div class="row mt-5">
                    <div class="col-md-6">
                        <h4>Referral Details:</h4>
                        <hr>
                        <h6><b>Referral Id:</b> {{ $order->id }}</h6>
                        <h6><b>Referraled Date:</b> {{ $order->created_at->format('d-m-Y h:i A') }}</h6>
                        <h6><b>Payment Mode:</b> {{ $order->payment_mode }}</h6>
                        <h6 class="mt-4 text-success">
                            <b> Referral Status:</b> <span class="text-uppercase">{{ $order->status_message }}</span>
                        </h6>
                    </div>
                    <div class="col-md-6">
                        <h4>User Details:</h4>
                        <hr>
                        <h6><b>Full Name:</b> {{ $order->fullname }}</h6>
                        <h6><b>Email Id:</b> {{ $order->email }}</h6>
                        <h6><b>Phone:</b> {{ $order->phone }}</h6>
                        <h6><b>Comment:</b> {{ $order->comment }}</h6>
                    </div>
                </div>
                <br />
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th><b>ID Doctors & Analyses</b></th>
                                <th><b>Image</b></th>
                                <th><b>Doctors & Analyses</b></th>
                                <th><b>Price</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalPrice = 0;
                            @endphp
                            @foreach ($order->orderItems as $orderItem)
                            <tr>
                                <td width="20%">{{ $orderItem->id }}</td>
                                <td style="height: 120px">
                                    @if ($orderItem->doctor && $orderItem->doctor->doctorImages->isNotEmpty())
                                        <img style="border-radius: 10px; height: 100px; width: 70px;" src="{{ asset($orderItem->doctor->doctorImages->first()->image) }}"  alt="Doctor Image">
                                    @elseif ($orderItem->analysis && $orderItem->analysis->analysisImages->isNotEmpty())
                                        <img style="border-radius: 10px; height: 100px; width: 70px;" src="{{ asset($orderItem->analysis->analysisImages->first()->image) }}" width="70" height="100" alt="Analysis Image">
                                    @else
                                        <span class="text-danger">No image available</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($orderItem->doctor)
                                        {{ $orderItem->doctor->name }} {{ $orderItem->doctor->surname }} - {{ $orderItem->doctor->name_of_specialty }}
                                    @elseif ($orderItem->analysis)
                                        {{ $orderItem->analysis->name }}
                                    @else
                                        <span class="text-danger">No Analyses and Doctors added to Plans</span>
                                    @endif
                                </td>
                                <td width="10%">${{ $orderItem->price }}</td>
                                @php
                                    $totalPrice += $orderItem->price;
                                @endphp
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="3" class="fw-bold">Total Amount:</td>
                                <td colspan="1" class="fw-bold">${{ $totalPrice }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card border mt-3" style="border-radius: 10px; padding-top: 10px;">
            <div class="card-body">
                <h4 style="color: #002266">REFERRAL PROCESS (REFERRAL STATUS UPDATES):</h4>
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        <form action="{{ url('admin/orders/'.$order->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <label class="mb-2"><b>Update Order Status:</b></label>
                            <div class="input-group">
                                <select name="order_status" class="form-select" style="border-top-left-radius: 10px; border-bottom-left-radius: 10px;">
                                    <option value="">Select All Status</option>
                                    <option value="in progress" {{ Request::get('status') == 'in progress' ? 'selected':'' }}>In Progress</option>
                                    <option value="completed" {{ Request::get('status') == 'completed' ? 'selected':'' }}>Completed</option>
                                    <option value="pending" {{ Request::get('status') == 'pending' ? 'selected':'' }}>Pending</option>
                                    <option value="cancelled" {{ Request::get('status') == 'cancelled' ? 'selected':'' }}>Cancelled</option>
                                    <option value="out-for-delivery" {{ Request::get('status') == 'out-for-delivery' ? 'selected':'' }}>Out for Delivery</option>
                                </select>
                                <button type="submit" class="btn btn-primary text-white" style="border-top-right-radius: 10px; border-bottom-right-radius: 10px;">Update</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <br />
                        <div>
                            <h5 class="mt-3 text-success"><b>Current Referral Status:</b> <span class="text-uppercase">{{ $order->status_message }}</span></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
