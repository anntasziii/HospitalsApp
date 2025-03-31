@extends('layouts.app')
@section('title', 'Change Password')
@section('content')

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h4 class="mb-4 stylized-title">Change My Password:</h4>
            </div>
            <div class="col-md-6">

                @if (session('message'))
                    <p class="alert alert-success mb-2">{{ session('message') }}</p>
                @endif

                @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <div class="card shadow" style="border-radius: 10px">
                    <div class="card-header d-flex align-items-center" style="background-color: #4d88ff; border-top-left-radius: 10px; border-top-right-radius: 10px; overflow: hidden; height: 50px;">
                        <h4 class="mb-0 text-white">Change Password:</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('change-password') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label>Current Password</label>
                                <input style="border-radius: 10px" type="password" name="current_password" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>New Password</label>
                                <input style="border-radius: 10px" type="password" name="password" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Confirm Password</label>
                                <input style="border-radius: 10px" type="password" name="password_confirmation" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn" style="background-color: #4d88ff; color: white; border-radius: 10px; width: 250px;">Update Password</button>
                                <a href="{{url('profile')}}" class="btn float-end text-end" style="background-color: red; color: white; border-radius: 10px;">
                                    Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
