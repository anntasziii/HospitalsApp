@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <h5 class="alert alert-success mb-2">{{session('message')}}</h5>
        @endif
        <div class="card" style="border-radius: 10px; padding-top: 10px;">
            <div class="card-header header-admin">
                <h2 style="color:#002266">EDIT DOCTORS:
                    <a href="{{ url('admin/doctors') }}" class="btn btn-danger btn-sm text-white float-end" style="width: 150px; border-radius: 10px;">
                        <svg viewBox="0 0 24 24"  width="20" height="20" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier">
                            <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9.00002 15.3802H13.92C15.62 15.3802 17 14.0002 17 12.3002C17 10.6002 15.62 9.22021 13.92 9.22021H7.15002" stroke="#FFFFFF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M8.57 10.7701L7 9.19012L8.57 7.62012" stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g>
                        </svg>
                        Back
                    </a>
                </h2>
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
                                <b>Home</b>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">
                                <b>SEO Tags</b>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                               <b>Details</b>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
                                <b>Doctor Image</b>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="times-tab" data-bs-toggle="tab" data-bs-target="#times-tab-pane" type="button">
                                <b>Doctor Times</b>
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
                                <input style="border-radius: 5px" type="text" name="name_of_specialty" value="{{ $doctor->name_of_specialty }}" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 mt-2">Doctor Name</label>
                                <input style="border-radius: 5px" type="text" name="name" value="{{ $doctor->name }}" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 mt-2">Doctor Surname</label>
                                <input style="border-radius: 5px" type="text" name="surname" value="{{ $doctor->surname }}" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 mt-2">Doctor Slug</label>
                                <input style="border-radius: 5px" type="text" name="slug" value="{{ $doctor->slug }}" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 mt-2">Select Type</label>
                                <select name="type" class="form-control">
                                    @foreach ($types as $type)
                                        <option style="border-radius: 5px" value="{{ $type->name }}" {{ $type->name == $doctor->type ? 'selected':'' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 mt-2">Small Description (500 words)</label>
                                <textarea style="border-radius: 5px" name="small_description" class="form-control" rows="4">{{ $doctor->small_description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 mt-2">Description</label>
                                <textarea style="border-radius: 5px" name="description" class="form-control" rows="4">{{ $doctor->description }}</textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                            <div class="mb-3">
                                <label class="mb-2 mt-3">Meta Title</label>
                                <input style="border-radius: 5px" type="text" name="meta_title" value="{{ $doctor->meta_title }}" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 mt-2">Meta Description</label>
                                <textarea style="border-radius: 5px" name="meta_description" class="form-control" rows="4">{{ $doctor->meta_description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 mt-2">Meta Keyword</label>
                                <textarea style="border-radius: 5px" name="meta_keyword" class="form-control" rows="4">{{ $doctor->meta_keyword }}</textarea>
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
                                        <input style="border-radius: 5px" type="number" name="quantity" value="{{ $doctor->quantity }}" class="form-control" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2 mt-2">Trending</label>
                                    <div class="checkbox-wrapper-7">
                                        <input class="tgl tgl-ios" id="cb2-7" name="trending" {{ $doctor->trending == '1' ? 'checked':'' }} type="checkbox"/>
                                        <label class="tgl-btn" for="cb2-7">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2 mt-2">Featured</label>
                                    <div class="checkbox-wrapper-7">
                                        <input class="tgl tgl-ios" id="cb2-8" name="featured" {{ $doctor->featured == '1' ? 'checked':'' }} type="checkbox"/>
                                        <label class="tgl-btn" for="cb2-8">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2 mt-2">Status</label>
                                    <div class="checkbox-wrapper-7">
                                        <input class="tgl tgl-ios" id="cb2-9"  name="status" {{ $doctor->status == '1' ? 'checked':'' }} type="checkbox"/>
                                        <label class="tgl-btn" for="cb2-9">
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
                                <label>Select Time</label>
                                <hr/>
                                <div class="row">
                                    @forelse ($times as $timeitem)
                                        <div class="col-md-3">
                                            <div class="p-2 border mb-3">
                                                <p class="mt-2" style="font-size: 16px;">Time: {{$timeitem->name}}</p>
                                                <input class="custom-checkbox"  type="checkbox" name="times[{{$timeitem->id}}]" value="{{$timeitem->id}}" />

                                                <br/>
                                                <p style="font-size: 16px;" class="mt-2">Quantity:
                                                <input
                                                    type="number"
                                                    name="timequantity[{{ $timeitem->id }}]"
                                                    style="width: 100px; height: 30px; border-radius: 5px; border: 2px solid #4d83ff; outline: none; padding: 5px;" /></p>
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
                                                <div class="input-group mb-3" style="width: 200px;">
                                                    <input type="text" value="{{ $doctorTime->quantity }}" class="doctorTimeQuantity form-control form-control-sm" style="border-top-left-radius: 10px; border-bottom-left-radius: 10px;" />
                                                    <button type="button" value="{{ $doctorTime->id }}" class="updateDoctorTimeBtn btn btn-primary btn-sm text-white" style="color: white; width: 120px; border-top-right-radius: 10px; border-bottom-right-radius: 10px;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0,0,256,256">
                                                            <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M43.125,2c-1.24609,0 -2.48828,0.48828 -3.4375,1.4375l-0.8125,0.8125l6.875,6.875c-0.00391,0.00391 0.8125,-0.8125 0.8125,-0.8125c1.90234,-1.90234 1.89844,-4.97656 0,-6.875c-0.95312,-0.94922 -2.19141,-1.4375 -3.4375,-1.4375zM37.34375,6.03125c-0.22656,0.03125 -0.4375,0.14453 -0.59375,0.3125l-32.4375,32.46875c-0.12891,0.11719 -0.22656,0.26953 -0.28125,0.4375l-2,7.5c-0.08984,0.34375 0.01172,0.70703 0.26172,0.95703c0.25,0.25 0.61328,0.35156 0.95703,0.26172l7.5,-2c0.16797,-0.05469 0.32031,-0.15234 0.4375,-0.28125l32.46875,-32.4375c0.39844,-0.38672 0.40234,-1.02344 0.01563,-1.42187c-0.38672,-0.39844 -1.02344,-0.40234 -1.42187,-0.01562l-32.28125,32.28125l-4.0625,-4.0625l32.28125,-32.28125c0.30078,-0.28906 0.39063,-0.73828 0.22266,-1.12109c-0.16797,-0.38281 -0.55469,-0.62109 -0.97266,-0.59766c-0.03125,0 -0.0625,0 -0.09375,0z"></path></g></g>
                                                        </svg>
                                                        Update</button>
                                                </div>
                                            </td>
                                            <td>
                                                <button type="button" value="{{$doctorTime->id}}" class="deleteDoctorTimeBtn btn btn-danger btn-sm text-black" style="color: rgb(0, 0, 0); width: 120px; border-radius: 10px;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 50 50">
                                                        <path d="M 21 0 C 19.355469 0 18 1.355469 18 3 L 18 5 L 10.1875 5 C 10.0625 4.976563 9.9375 4.976563 9.8125 5 L 8 5 C 7.96875 5 7.9375 5 7.90625 5 C 7.355469 5.027344 6.925781 5.496094 6.953125 6.046875 C 6.980469 6.597656 7.449219 7.027344 8 7 L 9.09375 7 L 12.6875 47.5 C 12.8125 48.898438 14.003906 50 15.40625 50 L 34.59375 50 C 35.996094 50 37.1875 48.898438 37.3125 47.5 L 40.90625 7 L 42 7 C 42.359375 7.003906 42.695313 6.816406 42.878906 6.503906 C 43.058594 6.191406 43.058594 5.808594 42.878906 5.496094 C 42.695313 5.183594 42.359375 4.996094 42 5 L 32 5 L 32 3 C 32 1.355469 30.644531 0 29 0 Z M 21 2 L 29 2 C 29.5625 2 30 2.4375 30 3 L 30 5 L 20 5 L 20 3 C 20 2.4375 20.4375 2 21 2 Z M 11.09375 7 L 38.90625 7 L 35.3125 47.34375 C 35.28125 47.691406 34.910156 48 34.59375 48 L 15.40625 48 C 15.089844 48 14.71875 47.691406 14.6875 47.34375 Z M 18.90625 9.96875 C 18.863281 9.976563 18.820313 9.988281 18.78125 10 C 18.316406 10.105469 17.988281 10.523438 18 11 L 18 44 C 17.996094 44.359375 18.183594 44.695313 18.496094 44.878906 C 18.808594 45.058594 19.191406 45.058594 19.503906 44.878906 C 19.816406 44.695313 20.003906 44.359375 20 44 L 20 11 C 20.011719 10.710938 19.894531 10.433594 19.6875 10.238281 C 19.476563 10.039063 19.191406 9.941406 18.90625 9.96875 Z M 24.90625 9.96875 C 24.863281 9.976563 24.820313 9.988281 24.78125 10 C 24.316406 10.105469 23.988281 10.523438 24 11 L 24 44 C 23.996094 44.359375 24.183594 44.695313 24.496094 44.878906 C 24.808594 45.058594 25.191406 45.058594 25.503906 44.878906 C 25.816406 44.695313 26.003906 44.359375 26 44 L 26 11 C 26.011719 10.710938 25.894531 10.433594 25.6875 10.238281 C 25.476563 10.039063 25.191406 9.941406 24.90625 9.96875 Z M 30.90625 9.96875 C 30.863281 9.976563 30.820313 9.988281 30.78125 10 C 30.316406 10.105469 29.988281 10.523438 30 11 L 30 44 C 29.996094 44.359375 30.183594 44.695313 30.496094 44.878906 C 30.808594 45.058594 31.191406 45.058594 31.503906 44.878906 C 31.816406 44.695313 32.003906 44.359375 32 44 L 32 11 C 32.011719 10.710938 31.894531 10.433594 31.6875 10.238281 C 31.476563 10.039063 31.191406 9.941406 30.90625 9.96875 Z"></path>
                                                    </svg>
                                                    Delete</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary text-white mt-3" style="width: 200px; border-radius: 10px;">
                            <svg viewBox="0 0 32 32" width="20" height="20" style="margin-right: 5px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>save-floppy</title> <desc>Created with Sketch Beta.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage"> <g id="Icon-Set" sketch:type="MSLayerGroup" transform="translate(-152.000000, -515.000000)" fill="#ffffff">
                                <path d="M171,525 C171.552,525 172,524.553 172,524 L172,520 C172,519.447 171.552,519 171,519 C170.448,519 170,519.447 170,520 L170,524 C170,524.553 170.448,525 171,525 L171,525 Z M182,543 C182,544.104 181.104,545 180,545 L156,545 C154.896,545 154,544.104 154,543 L154,519 C154,517.896 154.896,517 156,517 L158,517 L158,527 C158,528.104 158.896,529 160,529 L176,529 C177.104,529 178,528.104 178,527 L178,517 L180,517 C181.104,517 182,517.896 182,519 L182,543 L182,543 Z M160,517 L176,517 L176,526 C176,526.553 175.552,527 175,527 L161,527 C160.448,527 160,526.553 160,526 L160,517 L160,517 Z M180,515 L156,515 C153.791,515 152,516.791 152,519 L152,543 C152,545.209 153.791,547 156,547 L180,547 C182.209,547 184,545.209 184,543 L184,519 C184,516.791 182.209,515 180,515 L180,515 Z" id="save-floppy" sketch:type="MSShapeGroup">
                                </path> </g> </g> </g>
                            </svg>
                            Update Doctor</button>
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
