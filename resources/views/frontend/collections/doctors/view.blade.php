@extends('layouts.app')
@section('title')
    {{$doctor->meta_title}}
@endsection
@section('meta_keyword')
    {{$doctor->meta_keyword}}
@endsection
@section('meta_description')
    {{$doctor->meta_description}}
@endsection
@section('content')
<div>
    <livewire:frontend.doctor.view-doctor :hospital="$hospital" :doctor="$doctor" />
</div>
@endsection
