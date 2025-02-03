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
}
