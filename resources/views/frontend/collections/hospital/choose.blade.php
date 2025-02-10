@extends('layouts.app')
@section('title', 'All Hospitals')
@section('content')
<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4 stylized-title text-center">Select what you want to see (doctors or analyses):</h4>
            </div>

            <div class="col-md-5 text-center bg-white p-md-4" style="border-radius: 20px">
                <a class="stylized-text" href="{{ route('doctors', ['hospital_slug' => $hospital->slug]) }}">
                    <img style="height: 600px; border-radius: 20px" src="{{ asset('uploads/choose/doctors.png') }}" alt="Doctors" class="img-fluid shadow">
                </a>
                <div style="margin-top: 20px">
                    <a class="stylized-text">Doctors</a>
                </div>
                <div style="margin-top: 15px; margin-left: 35px; margin-right: 35px">
                    <a>You can quickly book an appointment with a doctor at our hospital. Choose from experienced specialists in various medical fields and receive professional consultation and treatment at a convenient time.<br>
                        <div style="margin-top: 10px">
                            <b>Your health is our priority!</b>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-2">
            </div>

            <div class="col-md-5 text-center bg-white p-md-4" style="border-radius: 20px">
                <a class="stylized-text" href="{{ route('analyses', ['hospital_slug' => $hospital->slug]) }}">
                    <img style="height: 600px; border-radius: 20px" src="{{ asset('uploads/choose/analyses.png') }}" alt="Analyses" class="img-fluid shadow">
                </a>
                <div style="margin-top: 20px">
                    <a class="stylized-text">Analyses</a>
                </div>
                <div style="margin-top: 15px; margin-left: 35px; margin-right: 35px">
                    <a>You can quickly schedule laboratory tests with us. Our modern diagnostic facilities ensure accurate and timely results. Choose the necessary tests and get reliable medical insights without delays!<br>
                        <div style="margin-top: 10px">
                            <b>Your health is our priority!</b>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
