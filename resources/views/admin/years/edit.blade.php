@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Edit Years
                    <a href="{{ url('admin/years') }}" class="btn btn-danger btn-sm text-white float-end">
                        Back
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/years/'.$year->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label>Year name</label>
                        <input type="text" name="name" value="{{$year->name}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Status</label><br />
                        <input type="checkbox" name="status" {{$year->status ? 'checked':''}} slyle="width:50px;height:50px"/> Checked = Hidden, UnChacked = Visible
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
