@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit hospital
                    <a href="{{ url('admin/hospital') }}" class="btn btn-primary btn-sm text-white float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/hospital/'.$hospital->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ $hospital->name }}" class="form-control" />
                            @error('name') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Sity</label>
                            <input type="text" name="sity" value="{{ $hospital->sity }}" class="form-control" />
                            @error('sity') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Region</label>
                            <input type="text" name="region" value="{{ $hospital->region }}" class="form-control" />
                            @error('region') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Slug</label>
                            <input type="text" name="slug" value="{{ $hospital->slug }}" class="form-control" />
                            @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ $hospital->description }}</textarea>
                            @error('description') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control" />
                            <img src="{{ asset('/uploads/hospital/'.$hospital->image) }}" width="65px" height="60px"/>
                            @error('image') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Status</label><br />
                            <input type="checkbox" name="status" {{ $hospital->status =='1' ? 'checked':'' }}/>
                            @error('status') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-12">
                            <h4>Seo Tags</h4>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Meta Title</label>
                            <input type="text" name="meta_title" value="{{ $hospital->meta_title }}" class="form-control" />
                            @error('meta_title') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Meta Keyword</label>
                            <textarea name="meta_keyword" class="form-control" rows="3">{{ $hospital->meta_keyword }}</textarea>
                            @error('meta_keyword') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="3">{{ $hospital->meta_description }}</textarea>
                            @error('meta_description') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary float-end">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
