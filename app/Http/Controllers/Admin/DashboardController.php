<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Analysis;
use App\Models\Hospital;
use App\Models\Type;
use App\Models\Order;
use App\Models\Slider;

use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $todayDate = Carbon::now()->format('d-m-Y');
        $thisMonth = Carbon::now()->format('m');
        $thisYear = Carbon::now()->format('Y');

        $totalDoctors = Doctor::count();
        $totalAnalyses = Analysis::count();
        $totalHospitals = Hospital::count();
        $totalTypes = Type::count();
        $totalOrder = Order::count();
        $totalUsers = User::where('role_as', '0')->count();
        $totalAdmin = User::where('role_as', '1')->count();
        $totalAllUsers = User::count();
        $todayOrder = Order::whereDate('created_at', $todayDate)->count();
        $totalMonthOrder = Order::whereMonth('created_at', $thisMonth)->count();
        $totalYearOrder = Order::whereYear('created_at', $thisYear)->count();
        $totalSliders = Slider::count();

        return view('admin.dashboard', compact('totalDoctors', 'totalAnalyses', 'totalHospitals', 'totalTypes',
                                                'totalAllUsers', 'totalUsers', 'totalAdmin', 'totalOrder',
                                                'todayOrder', 'totalMonthOrder', 'totalYearOrder', 'totalSliders'));
    }
}
