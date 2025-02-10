@extends('layouts.app')
@section('title')
    {{$analysis->meta_title}}
@endsection
@section('meta_keyword')
    {{$analysis->meta_keyword}}
@endsection
@section('meta_description')
    {{$analysis->meta_description}}
@endsection
@section('content')
<div>
    <livewire:frontend.analysis.view-analysis :hospital="$hospital" :analysis="$analysis" />
</div>
@endsection
