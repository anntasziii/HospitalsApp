@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header header-admin">
                <h3>ADD ANALYSYS
                    <a href="{{ url('admin/analyses') }}" class="btn btn-danger btn-sm text-white float-end" style="width: 150px;">
                        <svg viewBox="0 0 24 24"  width="20" height="20" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier">
                            <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9.00002 15.3802H13.92C15.62 15.3802 17 14.0002 17 12.3002C17 10.6002 15.62 9.22021 13.92 9.22021H7.15002" stroke="#FFFFFF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M8.57 10.7701L7 9.19012L8.57 7.62012" stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g>
                        </svg>
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
                <form action="{{ url('admin/analyses') }}" method="POST" enctype="multipart/form-data">
                    @csrf
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
                            <button class="nav-link" id="time-tab" data-bs-toggle="tab" data-bs-target="#time-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
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
                                        <option value="{{ $hospital->id }}">{{ $hospital->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 mt-2">Analysis Name</label>
                                <input style="border-radius: 5px" type="text" name="name" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 mt-2">Analysis Slug</label>
                                <input style="border-radius: 5px" type="text" name="slug" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 mt-2">Select Type</label>
                                <select name="type" class="form-control">
                                    @foreach ($types as $type)
                                        <option style="border-radius: 5px" value="{{ $type->name }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 mt-2">Small Description (500 words)</label>
                                <textarea style="border-radius: 5px" name="small_description" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 mt-2">Description</label>
                                <textarea style="border-radius: 5px" name="description" class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                            <div class="mb-3">
                                <label class="mb-2 mt-3">Meta Title</label>
                                <input style="border-radius: 5px" type="text" name="meta_title" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 mt-2">Meta Description</label>
                                <textarea style="border-radius: 5px" name="meta_description" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 mt-2">Meta Keyword</label>
                                <textarea style="border-radius: 5px" name="meta_keyword" class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="mb-2 mt-3">Original Price</label>
                                        <input style="border-radius: 5px" type="text" name="original_price" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="mb-2 mt-3">Quantity</label>
                                        <input style="border-radius: 5px" type="number" name="quantity" class="form-control" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2 mt-2">Trending</label>
                                    <div class="checkbox-wrapper-7">
                                        <input class="tgl tgl-ios" id="cb2-7" name="trending" type="checkbox"/>
                                        <label class="tgl-btn" for="cb2-7">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2 mt-2">Featured</label>
                                    <div class="checkbox-wrapper-7">
                                        <input class="tgl tgl-ios" id="cb2-8" name="featured" type="checkbox"/>
                                        <label class="tgl-btn" for="cb2-8">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2 mt-2">Status</label>
                                    <div class="checkbox-wrapper-7">
                                        <input class="tgl tgl-ios" id="cb2-9" name="status" type="checkbox"/>
                                        <label class="tgl-btn" for="cb2-9">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                            <div class="mb-3">
                                <label class="mb-2 mt-3">Upload analysis Images</label>
                                <input style="border-radius: 5px" type="file" name="image[]" multiple class="form-control" />
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
                                                <p class="mt-2" style="font-size: 16px;">Time: {{$timeitem->name}}</p>
                                                <input class="custom-checkbox" type="checkbox" name="times[{{$timeitem->id}}]" value="{{$timeitem->id}}" />
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
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary text-white mt-3" style="width: 200px;">
                            <svg viewBox="0 0 32 32" width="20" height="20" style="margin-right: 5px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>save-floppy</title> <desc>Created with Sketch Beta.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage"> <g id="Icon-Set" sketch:type="MSLayerGroup" transform="translate(-152.000000, -515.000000)" fill="#ffffff">
                                <path d="M171,525 C171.552,525 172,524.553 172,524 L172,520 C172,519.447 171.552,519 171,519 C170.448,519 170,519.447 170,520 L170,524 C170,524.553 170.448,525 171,525 L171,525 Z M182,543 C182,544.104 181.104,545 180,545 L156,545 C154.896,545 154,544.104 154,543 L154,519 C154,517.896 154.896,517 156,517 L158,517 L158,527 C158,528.104 158.896,529 160,529 L176,529 C177.104,529 178,528.104 178,527 L178,517 L180,517 C181.104,517 182,517.896 182,519 L182,543 L182,543 Z M160,517 L176,517 L176,526 C176,526.553 175.552,527 175,527 L161,527 C160.448,527 160,526.553 160,526 L160,517 L160,517 Z M180,515 L156,515 C153.791,515 152,516.791 152,519 L152,543 C152,545.209 153.791,547 156,547 L180,547 C182.209,547 184,545.209 184,543 L184,519 C184,516.791 182.209,515 180,515 L180,515 Z" id="save-floppy" sketch:type="MSShapeGroup">
                                </path> </g> </g> </g>
                            </svg>
                            Save Analysis</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
