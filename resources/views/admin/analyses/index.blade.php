@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Analyses
                    <a href="{{ url('admin/analyses/create') }}" class="btn btn-primary btn-sm text-white float-end">
                        Add Analyses
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Hospital</th>
                            <th>Analysis</th>
                            <th>Price</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($analyses as $analysis)
                            <tr>
                                <td>{{ $analysis->id }}</td>
                                <td>
                                    @if($analysis->hospital)
                                        {{ $analysis->hospital->name }}
                                    @else
                                        No Hospital
                                    @endif
                                </td>
                                <td>{{ $analysis->name }}</td>
                                <td>{{ $analysis->original_price }}</td>
                                <td>{{ $analysis->type }}</td>
                                <td>{{ $analysis->status == '1' ? 'Hidden':'Visible' }}</td>
                                <td>
                                    <a href="{{ url('admin/analyses/'.$analysis->id.'/edit') }}" class="btn btn-sm btn-success">Edit</a>
                                    <a href="{{ url('admin/analyses/'.$analysis->id.'/delete') }}" onclick="return confirm('Are you sure? Are you want to delete this data?')" class="btn btn-sm btn-danger">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9">No Analyses Available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
