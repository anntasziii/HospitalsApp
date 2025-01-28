@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Add Doctors
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
                <form action="{{ url('admin/doctors') }}" method="POST" enctype="multipart/form-data">
                    @csrf
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
                            <button class="nav-link" id="time-tab" data-bs-toggle="tab" data-bs-target="#time-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
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
                                        <option value="{{ $hospital->id }}">{{ $hospital->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 mt-2">Doctor Specialty</label>
                                <input type="text" name="name_of_specialty" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 mt-2">Doctor Name</label>
                                <input type="text" name="name" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 mt-2">Doctor Surname</label>
                                <input type="text" name="surname" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 mt-2">Doctor Slug</label>
                                <input type="text" name="slug" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 mt-2">Select Type</label>
                                <select name="type" class="form-control">
                                    @foreach ($types as $type)
                                        <option value="{{ $type->name }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 mt-2">Small Description (500 words)</label>
                                <textarea name="small_description" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 mt-2">Description</label>
                                <textarea name="description" class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                            <div class="mb-3">
                                <label class="mb-2 mt-3">Meta Title</label>
                                <input type="text" name="meta_title" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 mt-2">Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 mt-2">Meta Keyword</label>
                                <textarea name="meta_keyword" class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="mb-2 mt-3">Original Price</label>
                                        <input type="text" name="original_price" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="mb-2 mt-3">Quantity</label>
                                        <input type="number" name="quantity" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="mb-2 mt-2">Trending</label>
                                        <input type="checkbox" name="trending" slyle="width: 50px; height: 50px;" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="mb-2 mt-2">Featured</label>
                                        <input type="checkbox" name="featured" slyle="width: 50px; height: 50px;" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="mb-2 mt-2">Status</label>
                                        <input type="checkbox" name="status" slyle="width: 50px; height: 50px;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                            <div class="mb-3">
                                <label class="mb-2 mt-3">Upload Doctor Images</label>
                                <input type="file" name="image[]" multiple class="form-control" />
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="time-tab-pane" role="tabpanel" aria-labelledby="time-tab" tabindex="0">
                            <div class="mb-3">
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
                                            <h1>No Times found</h1>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
