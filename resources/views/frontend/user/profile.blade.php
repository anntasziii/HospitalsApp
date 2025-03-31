@extends('layouts.app')
@section('title', 'User Profile')
@section('content')
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h4 class="mb-4 stylized-title">My User Profile:</h4>
            </div>
            <div class="col-md-10">
                @if (session('message'))
                    <p class="alert alert-success">{{session('message')}}</p>
                @endif
                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->any() as $error)
                            <div class="text-danger">{{$error}}</div>
                        @endforeach
                    </ul>
                @endif
                <div class="card shadow" style="border-radius: 10px">
                    <div class="card-header d-flex align-items-center" style="background-color: #4d88ff; border-top-left-radius: 10px; border-top-right-radius: 10px; overflow: hidden; height: 50px;">
                        <h4 class="mb-0 text-white">User Details:</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{url('profile')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Username</label>
                                        <input style="border-radius: 10px" type="text" name="username" value="{{Auth::user()->name}}" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Email Address</label>
                                        <input style="border-radius: 10px" type="text" readonly value="{{Auth::user()->email}}" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Phone Number</label>
                                        <input style="border-radius: 10px" type="text" name="phone" value="{{Auth::user()->userDetail->phone ?? ''}}" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Zip/Pin Code</label>
                                        <input style="border-radius: 10px" type="text" name="pin_code" value="{{Auth::user()->userDetail->pin_code ?? ''}}" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Address</label>
                                        <textarea style="border-radius: 10px" name="address"  class="form-control" rows="3" >{{Auth::user()->userDetail->address ?? ''}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn" style="background-color: #4d88ff; color: white; border-radius: 10px; width: 150px;">Save Data</button>
                                    <a href="{{url('change-password')}}" class="btn float-end;" style="background-color: #004de6; color: white; border-radius: 10px; width: 200px;">Change Password</a>
                                    <a href="{{url('/')}}" class="btn float-end text-end" style="background-color: red; color: white; border-radius: 10px;">
                                        Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
