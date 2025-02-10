@extends('layouts.app')
@section('title')
    {{$hospital->meta_title}}
@endsection
@section('meta_keyword')
    {{$hospital->meta_keyword}}
@endsection
@section('meta_description')
    {{$hospital->meta_description}}
@endsection
@section('content')
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4 stylized-title">Analyses available at the hospital: {{$hospital->name}}:</h4>
                </div>
                <livewire:frontend.analysis.index :hospital="$hospital" />
            </div>
        </div>
    </div>
@endsection
