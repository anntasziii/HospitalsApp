@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Doctors
                    <a href="{{ url('admin/doctors/create') }}" class="btn btn-primary btn-sm text-white float-end">
                        Add Doctors
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Hospital</th>
                            <th>Doctor</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Price</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($doctors as $doctor)
                            <tr>
                                <td>{{ $doctor->id }}</td>
                                <td>
                                    @if($doctor->hospital)
                                        {{ $doctor->hospital->name }}
                                    @else
                                        No Hospital
                                    @endif
                                </td>
                                <td>{{ $doctor->name_of_specialty }}</td>
                                <td>{{ $doctor->name }}</td>
                                <td>{{ $doctor->surname }}</td>
                                <td>{{ $doctor->original_price }}</td>
                                <td>{{ $doctor->type }}</td>
                                <td>{{ $doctor->status == '1' ? 'Hidden':'Visible' }}</td>
                                <td>
                                    <a href="{{ url('admin/doctors/'.$doctor->id.'/edit') }}" class="btn btn-sm btn-success">Edit</a>
                                    <a href="{{ url('admin/doctors/'.$doctor->id.'/delete') }}" onclick="return confirm('Are you sure? Are you want to delete this data?')" class="btn btn-sm btn-danger">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9">No Doctors Available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
