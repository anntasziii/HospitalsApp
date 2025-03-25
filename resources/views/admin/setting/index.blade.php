@extends('layouts.admin')
@section('title', 'Admin Setting')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        @if (session('message'))
            <div class="alert alert-success mb-3">{{session('message')}}</div>
        @endif
        <form action="{{ url('/admin/settings')}}" method="POST">
            @csrf
            <div class="card mb-3" style="border-radius: 10px; padding-top: 10px;">
                <div class="card-header header-admin">
                    <h2><a>WEBSITE:</a></h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Website Name</label>
                            <input style="border-radius: 10px" type="text" name="website_name" value="{{$setting->website_name ?? ''}}" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Website URL</label>
                            <input style="border-radius: 10px" type="text" name="website_url" value="{{$setting->website_url ?? ''}}" class="form-control" />
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Page Title</label>
                            <input style="border-radius: 10px" type="text" name="page_title" value="{{$setting->page_title ?? ''}}" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Meta Keywords</label>
                            <input style="border-radius: 10px" type="text" name="meta_keyword" value="{{$setting->meta_keyword ?? ''}}" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Meta Description</label>
                            <input style="border-radius: 10px" type="text" name="meta_description" value="{{$setting->meta_description ?? ''}}" class="form-control" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3" style="border-radius: 10px; padding-top: 10px;">
                <div class="card-header header-admin">
                    <h2><a>WEBSITE - INFORMATION:</a></h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>Address</label>
                            <textarea style="border-radius: 10px" name="address" class="form-control" rows="3">{{$setting->address ?? ''}}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Phone #1</label>
                            <input style="border-radius: 10px" type="text" name="phone1" value="{{$setting->phone1 ?? ''}}" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Phone #2</label>
                            <input style="border-radius: 10px" type="text" name="phone2" value="{{$setting->phone2 ?? ''}}" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Email #1</label>
                            <input style="border-radius: 10px" type="text" name="email1" value="{{$setting->email1 ?? ''}}" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Email #2</label>
                            <input style="border-radius: 10px" type="text" name="email2" value="{{$setting->email2 ?? ''}}" class="form-control" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3" style="border-radius: 10px; padding-top: 10px;">
                <div class="card-header header-admin">
                    <h2><a>WEBSITE - SOCIAL MEDIA:</a></h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Facebook</label>
                            <input style="border-radius: 10px" type="text" name="facebook" value="{{$setting->facebook ?? ''}}" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Twitter</label>
                            <input style="border-radius: 10px" type="text" name="twitter" value="{{$setting->twitter ?? ''}}" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Instagram</label>
                            <input style="border-radius: 10px" type="text" name="instagram" value="{{$setting->instagram ?? ''}}" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>YouTube</label>
                            <input style="border-radius: 10px" type="text" name="youtube" value="{{$setting->youtube ?? ''}}" class="form-control" />
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary text-white" style="border-radius: 10px; height: 50px; width: 200px; font-size: 16px;">Save Settings</button>
            </div>
        </form>
    </div>
</div>
@endsection
