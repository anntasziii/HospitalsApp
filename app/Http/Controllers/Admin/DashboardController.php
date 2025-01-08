<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
// use App\Models\Brand;
// use App\Models\Category;
// use App\Models\Order;
// use App\Models\Product;
// use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // $todayDate = Carbon::now()->format('d-m-Y');
        // $thisMonth = Carbon::now()->format('m');
        // $thisYear = Carbon::now()->format('Y');
        // // $totalProducts = Product::count();
        // $totalCategories = Category::count();
        // $totalBrands = Brand::count();
        // $totalAllUsers = User::count();
        // $totalUser = User::where('role_as', '0')->count();
        // $totalAdmin = User::where('role_as', '1')->count();
        // $totalOrder = Order::count();
        // $todayOrder = Order::whereDate('created_at', $todayDate)->count();
        // $totalMonthOrder = Order::whereMonth('created_at', $thisMonth)->count();
        // $totalYearOrder = Order::whereYear('created_at', $thisYear)->count();
        // return view('admin.dashboard', compact('totalProducts', 'totalCategories', 'totalBrands',
        //                                         'totalAllUsers', 'totalUser', 'totalAdmin', 'totalOrder',
        //                                         'todayOrder', 'totalMonthOrder', 'totalYearOrder'));
        return view('admin.dashboard');
    }
}
