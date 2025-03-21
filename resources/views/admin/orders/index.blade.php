@extends('layouts.admin')
@section('title', 'Orders')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card" style="border-radius: 10px; padding-top: 10px;">
            <div class="card-header header-admin">
                <h2><a>REFERRALS:</a></h2>
            </div>
            <div class="card-body">
                <form action="" method="GET">
                    <div class="row">
                        <div class="col-md-3">
                            <label class="mb-3" style="color: #002b80; font-weight: bold; margin-left: 3px;">Filter by Date:</label>
                            <input type="date" name="date" value="{{Request::get('date') ?? date('Y-m-d')}}" class="form-control" style="height: 50px; border-radius: 10px;" />
                        </div>
                        <div class="col-md-3">
                            <label class="mb-3" style="color: #002b80; font-weight: bold; margin-left: 3px;">Filter by Status:</label>
                            <select name="status" class="form-select" style="height: 50px; border-radius: 10px;">
                                <option value="">Select All Status</option>
                                <option value="in progress" {{Request::get('status') == 'in progress' ? 'selected':''}}>In Progress</option>
                                <option value="completed" {{Request::get('status') == 'completed' ? 'selected':''}}>Completed</option>
                                <option value="pending" {{Request::get('status') == 'pending' ? 'selected':''}}>Pending</option>
                                <option value="cancelled" {{Request::get('status') == 'cancelled' ? 'selected':''}}>Cancelled</option>
                                <option value="out-for-delivery" {{Request::get('status') == 'out-for-delivery' ? 'selected':''}}>Out for Delivery</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <br />
                            <button type="submit" class="btn btn-sm" style="background-color: #C0E5B6; width: 150px; height: 50px; margin-top: 15px; border-radius: 10px;  font-size: 16px;">
                                Filter</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive" style="margin-top: 20px">
                    <table class="table table-bordered table-striped" style="border-radius: 10px">
                        <thead>
                            <tr>
                                <th>REFERRAL ID</th>
                                <th>USERNAME</th>
                                <th>PAYMENT MODE</th>
                                <th>REFERRALED DATE</th>
                                <th>STATUS MESSAGE</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->fullname}}</td>
                                    <td>{{$item->payment_mode}}</td>
                                    <td>{{$item->created_at->format('d-m-Y')}}</td>
                                    <td>{{$item->status_message}}</td>
                                    <td><a href="{{url('admin/orders/'.$item->id)}}" class="btn btn-primary text-white" style="color: white; width: 120px; border-radius: 10px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0,0,256,256">
                                            <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M43.125,2c-1.24609,0 -2.48828,0.48828 -3.4375,1.4375l-0.8125,0.8125l6.875,6.875c-0.00391,0.00391 0.8125,-0.8125 0.8125,-0.8125c1.90234,-1.90234 1.89844,-4.97656 0,-6.875c-0.95312,-0.94922 -2.19141,-1.4375 -3.4375,-1.4375zM37.34375,6.03125c-0.22656,0.03125 -0.4375,0.14453 -0.59375,0.3125l-32.4375,32.46875c-0.12891,0.11719 -0.22656,0.26953 -0.28125,0.4375l-2,7.5c-0.08984,0.34375 0.01172,0.70703 0.26172,0.95703c0.25,0.25 0.61328,0.35156 0.95703,0.26172l7.5,-2c0.16797,-0.05469 0.32031,-0.15234 0.4375,-0.28125l32.46875,-32.4375c0.39844,-0.38672 0.40234,-1.02344 0.01563,-1.42187c-0.38672,-0.39844 -1.02344,-0.40234 -1.42187,-0.01562l-32.28125,32.28125l-4.0625,-4.0625l32.28125,-32.28125c0.30078,-0.28906 0.39063,-0.73828 0.22266,-1.12109c-0.16797,-0.38281 -0.55469,-0.62109 -0.97266,-0.59766c-0.03125,0 -0.0625,0 -0.09375,0z"></path></g></g>
                                        </svg>
                                        View</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">No Referral Available</td>
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
@endsection
