<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\HospitalController;
use App\Http\Controllers\Admin\DoctorController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::controller(App\Http\Controllers\Frontend\FrontendController::class)->group(function (){
    Route::get('/','index');
    Route::get('/hospitals','hospitals');

    // У routes/web.php
    Route::get('/collections/{hospital_slug}', 'choose');

    Route::get('/collections/{hospital_slug}/doctors', 'doctors')->name('doctors');
    Route::get('/collections/{hospital_slug}/analyses', 'analyses')->name('analyses');


    Route::prefix('collections/{hospital_slug}')->group(function () {
        Route::get('/doctors/{doctor_slug}', 'doctorView')->name('doctorView');
        Route::get('/analyses/{analysis_slug}', 'analysisView')->name('analysisView');
    });


    // Route::get('/collections/{hospital_slug}/{doctor_slug}','doctorView');
    // Route::get('/collections/{hospital_slug}/{analysis_slug}','analysisView');

    // Route::get('/new-arrivals', 'newArrival');
    // Route::get('/featured-products', 'featuredProducts');
    // Route::get('search', 'searchProduct');
});

Route::middleware(['auth'])->group(function(){
    Route::get('wishlist',[App\Http\Controllers\Frontend\WishlistController::class, 'index']);
    Route::get('cart',[App\Http\Controllers\Frontend\CartController::class, 'index']);
    Route::get('checkout',[App\Http\Controllers\Frontend\CheckoutController::class, 'index']);
    Route::get('orders', [App\Http\Controllers\Frontend\OrderController::class, 'index']);
    Route::get('orders/{orderId}', [App\Http\Controllers\Frontend\OrderController::class, 'show']);
    // Route::get('profile', [App\Http\Controllers\Frontend\UserController::class, 'index']);
    // Route::post('profile', [App\Http\Controllers\Frontend\UserController::class, 'updateUserDetails']);'
    // Route::get('change-password', [App\Http\Controllers\Frontend\UserController::class, 'passwordCreate']);
    // Route::post('change-password', [App\Http\Controllers\Frontend\UserController::class, 'changePassword']);

});
Route::get('thank-you', [App\Http\Controllers\Frontend\FrontendController::class, 'thankyou']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    //Route::get('settings', [App\Http\Controllers\Admin\SettingController::class, 'index']);
    //Route::post('settings', [App\Http\Controllers\Admin\SettingController::class, 'store']);

    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function (){
        Route::get('sliders', 'index');
        Route::get('sliders/create', 'create');
        Route::post('sliders/create', 'store');
        Route::get('sliders/{slider}/edit', 'edit');
        Route::put('sliders/{slider}', 'update');
        Route::get('sliders/{slider}/delete', 'destroy');
    });

    Route::controller(App\Http\Controllers\Admin\HospitalController::class)->group(function (){
        Route::get('/hospital', 'index');
        Route::get('/hospital/create', 'create');
        Route::post('/hospital', 'store');
        Route::get('/hospital/{hospital}/edit', 'edit');
        Route::put('/hospital/{hospital}', 'update');
    });

     Route::controller(App\Http\Controllers\Admin\DoctorController::class)->group(function (){
        Route::get('/doctors', 'index');
        Route::get('/doctors/create', 'create');
        Route::post('/doctors', 'store');
        Route::get('/doctors/{doctor}/edit', 'edit');
        Route::put('/doctors/{doctor}', 'update');
        Route::get('doctors/{doctor_id}/delete', 'destroy');
        Route::get('doctor-image/{doctor_image_id}/delete', 'destroyImage');

        Route::post('doctor-time/{doctor_time_id}', 'updateDoctorTimeQty');
        Route::get('doctor-time/{doctor_time_id}/delete', 'deleteDoctorTime');
     });

     Route::controller(App\Http\Controllers\Admin\AnalysisController::class)->group(function (){
        Route::get('/analyses', 'index');
        Route::get('/analyses/create', 'create');
        Route::post('/analyses', 'store');
        Route::get('/analyses/{analysis}/edit', 'edit');
        Route::put('/analyses/{analysis}', 'update');
        Route::get('analyses/{analysis_id}/delete', 'destroy');
        Route::get('analysis-image/{analysis_image_id}/delete', 'destroyImage');

        Route::post('analysis-time/{analysis_time_id}', 'updateAnalysisTimeQty');
        Route::get('analysis-time/{analysis_time_id}/delete', 'deleteAnalysisTime');

     });

    Route::get('/types', App\Http\Livewire\Admin\Type\Index::class);

    Route::controller(App\Http\Controllers\Admin\TimeController::class)->group(function (){
        Route::get('/times', 'index');
        Route::get('/times/create', 'create');
        Route::post('/times/create', 'store');
        Route::get('/times/{time}/edit', 'edit');
        Route::put('/times/{time_id}', 'update');
        Route::get('times/{time_id}/delete', 'destroy');
    });

    Route::controller(App\Http\Controllers\Admin\OrderController::class)->group(function (){
        Route::get('/orders', 'index');
        Route::get('/orders/{orderId}', 'show');
        Route::put('/orders/{orderId}', 'updateOrderStatus');
        Route::get('/invoice/{orderId}', 'viewInvoice');
        Route::get('/invoice/{orderId}/generate', 'generateInvoice');
    //     Route::get('/invoice/{orderId}/mail', 'mailInvoice');
    // });
    // Route::controller(App\Http\Controllers\Admin\UserController::class)->group(function (){
    //     Route::get('/users', 'index');
    //     Route::get('/users/create', 'create');
    //     Route::post('/users', 'store');
    //     Route::get('/users/{user_id}/edit', 'edit');
    //     Route::put('/users/{user_id}', 'update');
    //     Route::get('users/{user_id}/delete', 'destroy');
    });
});
