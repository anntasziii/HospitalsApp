@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Years List
                    <a href="{{ url('admin/years/create') }}" class="btn btn-primary btn-sm text-white float-end">
                        Add Year
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <td>Id</td>
                            <td>Year</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($years as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->status ? 'Hidden':'Visible'}}</td>
                                <td>
                                    <a href="{{url('admin/years/'.$item->id.'/edit')}}" class="btn btn-sm btn-success">Edit</a>
                                    <a href="{{url('admin/years/'.$item->id.'/delete')}}" onclick="return confirm('Are you sure? Are you want to delete this data?')" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
