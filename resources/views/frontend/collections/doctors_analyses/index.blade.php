<h2>Select what you want to see</h2>
<div>
    <a href="{{ route('doctors', ['hospital_slug' => $hospital->slug]) }}">Doctors</a>
</div>
<div>
    <a href="{{ route('analyses', ['hospital_slug' => $hospital->slug]) }}">Analyses</a>
</div>
