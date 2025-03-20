@extends('layouts.app')
@section('title', 'My Orders')
@section('content')
<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 shopping-cart">
                <div class="shadow bg-white p-3 cart-item">
                    <h4 class="mb-4" style="color: #002b80;letter-spacing: 1px;">My Referral to Doctors and Analyses:</h4>
                    <hr>
                    <div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Referral ID</th>
                                    <th>Username</th>
                                    <th>Payment Mode</th>
                                    <th>Date & Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $item)
                                    <tr style="font-weight: normal; height: 70px; vertical-align: middle;">
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->fullname}}</td>
                                        <td>{{$item->payment_mode}}</td>
                                        <td>{{$item->created_at->format('d-m-Y')}}</td>
                                        <td>{{$item->status_message}}</td>
                                        <td><a href="{{url('orders/'.$item->id)}}" class="btn btn-sm" style="background-color: #4d88ff; color: white; border-radius: 10px; width: 100px;">
                                            View
                                        </a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7"><h4 style="color: red; margin-top: 10px; font-size: 20px;">No Analyses and Doctors added to Plans</h4></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <div>
                            {{$orders->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
