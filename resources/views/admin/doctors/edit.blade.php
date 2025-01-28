@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <h5 class="alert alert-success mb-2">{{session('message')}}</h5>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Edit Doctors
                    <a href="{{ url('admin/doctors') }}" class="btn btn-danger btn-sm text-white float-end">
                        Back
                    </a>
                </h3>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-warning">
                        @foreach ($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{ url('admin/doctors/'.$doctor->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                                Home
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">
                                SEO Tags
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                                Details
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
                                Doctor Image
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="times-tab" data-bs-toggle="tab" data-bs-target="#times-tab-pane" type="button">
                                Doctor Times
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="mb-3">
                                <label class="mb-2 mt-3">Hospital</label>
                                <select name="hospitals_id" class="form-control">
                                    @foreach ($hospitals as $hospital)
                                        <option value="{{ $hospital->id }}" {{ $hospital->id == $doctor->hospitals_id ? 'selected':'' }}>
                                            {{ $hospital->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 mt-2">Doctor Specialty</label>
                                <input type="text" name="name_of_specialty" value="{{ $doctor->name_of_specialty }}" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 mt-2">Doctor Name</label>
                                <input type="text" name="name" value="{{ $doctor->name }}" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 mt-2">Doctor Surname</label>
                                <input type="text" name="surname" value="{{ $doctor->surname }}" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 mt-2">Doctor Slug</label>
                                <input type="text" name="slug" value="{{ $doctor->slug }}" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 mt-2">Select Type</label>
                                <select name="type" class="form-control">
                                    @foreach ($types as $type)
                                        <option value="{{ $type->name }}" {{ $type->name == $doctor->type ? 'selected':'' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 mt-2">Small Description (500 words)</label>
                                <textarea name="small_description" class="form-control" rows="4">{{ $doctor->small_description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 mt-2">Description</label>
                                <textarea name="description" class="form-control" rows="4">{{ $doctor->description }}</textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                            <div class="mb-3">
                                <label class="mb-2 mt-3">Meta Title</label>
                                <input type="text" name="meta_title" value="{{ $doctor->meta_title }}" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 mt-2">Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="4">{{ $doctor->meta_description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 mt-2">Meta Keyword</label>
                                <textarea name="meta_keyword" class="form-control" rows="4">{{ $doctor->meta_keyword }}</textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="mb-2 mt-3">Original Price</label>
                                        <input type="text" name="original_price" value="{{ $doctor->original_price }}" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="mb-2 mt-3">Quantity</label>
                                        <input type="number" name="quantity" value="{{ $doctor->quantity }}" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="mb-2 mt-2">Trending</label>
                                        <input type="checkbox" name="trending" {{ $doctor->trending == '1' ? 'checked':'' }} slyle="width: 50px; height: 50px;" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="mb-2 mt-2">Featured</label>
                                        <input type="checkbox" name="featured" {{ $doctor->featured == '1' ? 'checked':'' }} slyle="width: 50px; height: 50px;" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="mb-2 mt-2">Status</label>
                                        <input type="checkbox" name="status" {{ $doctor->status == '1' ? 'checked':'' }} slyle="width: 50px; height: 50px;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                            <div class="mb-3">
                                <label class="mb-2 mt-3">Upload Doctor Images</label>
                                <input type="file" name="image[]" multiple class="form-control" />
                            </div>
                            <div>
                                @if($doctor->doctorImages->isNotEmpty())
                                <div class="row">
                                    @foreach($doctor->doctorImages as $image)
                                        <div class="col-md-2">
                                            <img src="{{ asset($image->image) }}" style="width: 100px; height: 80px" class="me-4 border" alt="Img" />
                                            <a href="{{ url('admin/doctor-image/'.$image->id.'/delete') }}" class="d-block" style="color: rgb(33, 8, 193); text-decoration: none;">Remove</a>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <h5>No Image Added</h5>
                            @endif

                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="times-tab-pane" role="tabpanel" tabindex="0">
                            <div class="mb-3">
                                <h4>Add Doctor Time</h4>
                                <label>Select Time</label>
                                <hr/>
                                <div class="row">
                                    @forelse ($times as $timeitem)
                                        <div class="col-md-3">
                                            <div class="p-2 border mb-3">
                                                Time: <input type="checkbox" name="times[{{$timeitem->id}}]" value="{{$timeitem->id}}" />
                                                {{$timeitem->name}}
                                                <br/>
                                                Quantity: <input type="number" name="timequantity[{{ $timeitem->id }}]" style="width:70px; border: 1px solid" />
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-md-12">
                                            <h1>No times found</h1>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Time</th>
                                            <th>Quantity</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($doctor->doctorTimes as $doctorTime)
                                        <tr class="doctor-time-tr">
                                            <td>
                                                @if($doctorTime->time)
                                                    {{$doctorTime->time->name}}
                                                @else
                                                    No Time Found
                                                @endif
                                            </td>
                                            <td>
                                                <div class="input-group mb-3" style="width: 150px">
                                                    <input type="text" value="{{ $doctorTime->quantity }}" class="doctorTimeQuantity form-control form-control-sm" />
                                                    <button type="button" value="{{ $doctorTime->id }}" class="updateDoctorTimeBtn btn btn-primary btn-sm text-white">Update</button>
                                                </div>
                                            </td>
                                            <td>
                                                <button type="button" value="{{$doctorTime->id}}" class="deleteDoctorTimeBtn btn btn-danger btn-sm text-white">Delete</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary mt-2">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click', '.updateDoctorTimeBtn', function(){
            var doctor_id = "{{$doctor->id}}";
            var doctor_time_id = $(this).val();
            var qty = $(this).closest('.doctor-time-tr').find('.doctorTimeQuantity').val();
            //alert(doctor_time_id);

            if(qty <= 0){
                alert('Quantity is required');
                return false;
            }
            var data = {
                'doctor_id': doctor_id,
                'qty': qty
            };
            $.ajax({
                type: "POST",
                url: "/admin/doctor-time/"+doctor_time_id,
                data: data,
                success: function(response){
                    alert(response.message)
                }
            });
        });
        $(document).on('click', '.deleteDoctorTimeBtn', function(){
            var doctor_time_id = $(this).val();
            var thisClick = $(this);
            $.ajax({
                type: "GET",
                url: "/admin/doctor-time/"+doctor_time_id+"/delete",
                success: function(response){
                    thisClick.closest('.doctor-time-tr').remove();
                    alert(response.message)
                }
            });
        });
    });
</script>
@endsection
