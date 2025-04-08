@extends('layouts.app')
@section('title', 'All Hospitals')
@section('content')
<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4 stylized-title">You can choose a hospital:</h4>
            </div>
            <div class="col-md-3">
                <form method="GET" action="{{ url('/hospitals') }}">
                    <div class="product-card mb-3">
                        <div class="card-header"><h4>Sort by name</h4></div>
                        <div class="card-body radio-container">
                            <label>
                                <input type="radio" name="sort" value="asc" onchange="this.form.submit()"
                                    {{ request('sort') == 'asc' ? 'checked' : '' }}> Ascending (A-Z)
                            </label>
                            <label>
                                <input type="radio" name="sort" value="desc" onchange="this.form.submit()"
                                    {{ request('sort') == 'desc' ? 'checked' : '' }}> Descending (Z-A)
                            </label>
                        </div>
                    </div>
                    <div class="product-card">
                        <div class="card-header"><h4>Filter by Oblast</h4></div>
                        <div class="card-body">
                            <select style="border-radius: 10px" name="region" class="form-control" onchange="this.form.submit()">
                                <option value="">All Regions</option>
                                @php
                                    $regions = [
                                        'Vinnytsia Oblast',
                                        'Volyn Oblast',
                                        'Dnipro Oblast',
                                        'Donetsk Oblast',
                                        'Zhytomyr Oblast',
                                        'Khmelnytskyi Oblast',
                                        'Kyiv Oblast',
                                        'Kirovohrad Oblast',
                                        'Luhansk Oblast',
                                        'Lviv Oblast',
                                        'Mykolaiv Oblast',
                                        'Odesa Oblast',
                                        'Poltava Oblast',
                                        'Rivne Oblast',
                                        'Sumy Oblast',
                                        'Ternopil Oblast',
                                        'Kharkiv Oblast',
                                        'Kherson Oblast',
                                        'Cherkasy Oblast',
                                        'Chernivtsi Oblast',
                                        'Chernihiv Oblast',
                                        'Zakarpattia Oblast',
                                        'Zaporizhzhia Oblast',
                                        'Ivano-Frankivsk Oblast',
                                        'Autonomous Republic of Crimea',
                                    ];
                                @endphp
                                @foreach ($regions as $region)
                                    <option value="{{ $region }}" {{ request('region') == $region ? 'selected' : '' }}>
                                        {{ $region }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="product-card mt-3">
                        <div class="card-header"><h4>Filter by City</h4></div>
                        <div class="card-body">
                            <select style="border-radius: 10px" name="sity" class="form-select" onchange="this.form.submit()">
                                <option value="">All cities</option>
                                @php
                                    $cities = [
                                        'Lutsk',
                                        'Vinnytsia',
                                        'Kovel',
                                        'Dnipro',
                                        'Donetsk',
                                        'Kramatorsk',
                                        'Mariupol',
                                        'Khmelnytskyi',
                                        'Kamianets-Podilskyi',
                                        'Ternopil',
                                        'Chortkiv',
                                        'Lviv',
                                        'Ivano-Frankivsk',
                                        'Kolomyia',
                                        'Kalush',
                                        'Chernivtsi',
                                        'Zhytomyr',
                                        'Drohobych',
                                        'Shepetivka',
                                        'Mukachevo',
                                        'Kryvyi Rih',
                                        'Zaporizhzhia',
                                        'Sumy',
                                        'Poltava',
                                        'Kremenchuk',
                                    ];
                                @endphp
                                @foreach ($cities as $sity)
                                    <option value="{{ $sity }}" {{ request('sity') == $sity ? 'selected' : '' }}>
                                        {{ $sity }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </form>
            </div>


            <div class="col-md-9">
                <div class="row">
                    @forelse ($hospitals as $hospitalItem)
                    <div class="col-6 col-md-4">
                        <div class="hospital-card" style="min-height: 350px;">
                            <a href="{{ url('/collections/' . $hospitalItem->slug) }}">
                                <div class="hospital-card-img" style="width: 100%; height: 220px; overflow: hidden;">
                                    <img src="{{ asset("$hospitalItem->image") }}"
                                        style="width: 100%; height: 100%; object-fit: cover;"
                                        alt="{{ $hospitalItem->name }}">
                                </div>
                                <div class="hospital-card-body">
                                    <h5>{{ $hospitalItem->name }}</h5>
                                    <div class="mt-2"><b>City:</b> {{ $hospitalItem->sity }}</div>
                                    <div><b>Region:</b> {{ $hospitalItem->region }}</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @empty
                        <div class="col-md-12">
                            <h5>No Hospitals Available</h5>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
