@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Add Times
                    <a href="{{ url('admin/times') }}" class="btn btn-danger btn-sm text-white float-end">
                        Back
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/times/create') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Time</label>
                        <input type="text" name="name" class="form-control" placeholder="00:00">
                    </div>
                    <div class="mb-3">
                        <label>Status</label><br />
                        <input type="checkbox" name="status" slyle="width:50px;height:50px"/> Checked = Hidden, UnChacked = Visible
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
