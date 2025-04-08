<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\Hospital;
use App\Models\Doctor;
use App\Models\Analysis;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $sliders = Slider::where('status', '0')->get();
        $trendingDoctors = Doctor::where('trending', '1')->latest()->take(15)->get();
        $trendingAnalyses = Analysis::where('trending', '1')->latest()->take(15)->get();
        return view('frontend.index', compact('sliders', 'trendingDoctors', 'trendingAnalyses'));
    }
    public function newArrival(){
        $newArrivalsHospitals = Hospital::latest()->take(16)->get();
        return view('frontend.pages.new-arrival', compact('newArrivalsHospitals'));
    }
    public function hospitals(Request $request)
    {
        $query = Hospital::where('status', '0');

        if ($request->has('region') && $request->region != '') {
            $query->where('region', $request->region);
        }

        if ($request->has('sity') && $request->sity != '') {
            $query->where('sity', $request->sity);
        }

        if ($request->has('sort') && $request->sort == 'asc') {
            $query->orderBy('name', 'asc');
        }
         elseif ($request->has('sort') && $request->sort == 'desc') {
            $query->orderBy('name', 'desc');
        }

        $hospitals = $query->get();

        return view('frontend.collections.hospital.index', compact('hospitals'));
    }
    public function featuredDoctors(){
        $featuredDoctors = Doctor::where('featured', '1')->latest()->get();
        return view('frontend.pages.featured-doctors', compact('featuredDoctors'));
    }
    public function featuredAnalyses(){
        $featuredAnalyses = Analysis::where('featured', '1')->latest()->get();
        return view('frontend.pages.featured-analyses', compact('featuredAnalyses'));
    }
    public function choose($hospital_slug)
    {
        $hospital = Hospital::where('slug', $hospital_slug)->first();

        if ($hospital) {
            return view('frontend.collections.hospital.choose', compact('hospital'));
        }
        else{
            return redirect()->back();
        }
    }

    public function doctors($hospital_slug){
        $hospital = Hospital::where('slug', $hospital_slug)->first();
        if($hospital){
            return view('frontend.collections.doctors.index', compact('hospital'));
        }
    }
    public function analyses($hospital_slug){
        $hospital = Hospital::where('slug', $hospital_slug)->first();
        if($hospital){
            return view('frontend.collections.analyses.index', compact('hospital'));
        }
    }

    public function doctorView(string $hospital_slug, string $doctor_slug){
        $hospital = Hospital::where('slug', $hospital_slug)->first();
        if($hospital){
            $doctor = $hospital->doctors()->where('slug', $doctor_slug)->where('status', '0')->first();
            if($doctor)
            {
                return view('frontend.collections.doctors.view', compact('doctor', 'hospital'));
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect()->back();
        }
    }
    public function analysisView(string $hospital_slug, string $analysis_slug){
        $hospital = Hospital::where('slug', $hospital_slug)->first();
        if($hospital){
            $analysis = $hospital->analyses()->where('slug', $analysis_slug)->where('status', '0')->first();
            if($analysis)
            {
                return view('frontend.collections.analyses.view', compact('analysis', 'hospital'));
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect()->back();
        }
    }
    public function thankyou(){
        return view('frontend.thank-you');
    }

    public function searchHospital(Request $request){
        if($request->search){
            $searchHospital = Hospital::where('name', 'LIKE', '%'.$request->search.'%')->latest()->paginate(15);
            return view('frontend.pages.search', compact('searchHospital'));
        }
        else{
            return redirect()->back()->with('message', 'Empty Search');
        }
    }

}
