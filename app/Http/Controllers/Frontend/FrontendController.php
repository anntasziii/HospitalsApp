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
        // $trendingProducts = Product::where('trending', '1')->latest()->take(15)->get();
        // $newArrivalsProducts = Product::latest()->take(12)->get();
        // $featuredProducts = Product::where('featured', '1')->latest()->take(8)->get();
        return view('frontend.index', compact('sliders'));
        // return view('frontend.index', compact('sliders', 'trendingProducts', 'newArrivalsProducts', 'featuredProducts'));
    }
    public function hospitals(){
        $hospitals = Hospital::where('status', '0')->get();
        return view('frontend.collections.hospital.index', compact('hospitals'));
    }
    public function doctors_analyses($hospital_slug){
        $hospital = Hospital::where('slug', $hospital_slug)->first();
        if($hospital){
            return view('frontend.collections.doctors.index', compact('hospital'));
        }
        else{
            return redirect()->back();
        }
    }
    // public function analysys($analysis_slug){
    //     $analysis = Analysis::where('slug', $analysis_slug)->first();
    //     if($analysis){
    //         return view('frontend.collections.analyses.index', compact('analysis'));
    //     }
    //     else{
    //         return redirect()->back();
    //     }
    // }
}
