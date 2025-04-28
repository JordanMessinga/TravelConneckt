<?php

use App\Http\Controllers\adminPanelController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminAuthMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Models\City;
Route::get('/',[HomePageController::class,"show_homepage"] )->name("home");


//Route::view( '/sign_up',  'sign_up');

Route::get('/sign_up', [AuthController::class, 'showSign_up'])->name('show.sign_up') ;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login') ;

Route::post('/sign_up_post', [AuthController::class, 'Sign_up'])->name('sign_up_post') ;

Route::post('/login_post', [AuthController::class, 'Login'])->name('login_post') ;

Route::get('/logout', [AuthController::class, 'logout'])->name('logout') ;
Route::post("/filtered",[HomePageController::class,"filterTrips"])->name("filter");

Route::get('/schedules', [AuthController::class, 'show_schedules'])->name('schedules') ;

Route::get("/trajets-details/{id}", [HomePageController::class, "showdetails"])->name("trajet_details");

Route::middleware(AdminAuthMiddleware::class)->group(function(){

    Route::get("/admin/dashboard",[adminPanelController::class,"show_dashboard"])->name("dashboard");
    Route::get("/admin/trip_list",[adminPanelController::class,"show_trips"])->name("trip_lists");
    Route::get("/admin/create_trip",[adminPanelController::class,"create_trip"])->name("create_trip");
    Route::post("/admin/post_trip",[adminPanelController::class,"post_trip"])->name("trip_post");

    //cities
    
    Route::get("/admin/cities_list",[adminPanelController::class,"show_cities"])->name("cities_lists");
    Route::get("/admin/create_city",[adminPanelController::class,"create_city"])->name("create_city");
    Route::post("/admin/post_city",[adminPanelController::class,"post_city"])->name("city_post");
    
    //agencies 
    Route::get("/admin/agencies_list",[adminPanelController::class,"show_agencies"])->name("show_agencies");
    Route::get("/admin/create_agency",[adminPanelController::class,"create_agency"])->name("create_agency");
    Route::post("/admin/post_agency",[adminPanelController::class,"post_agency"])->name("agency_post");
    //category
    Route::get("/admin/create_category",[adminPanelController::class,"create_category"])->name("create_category");
    Route::post("/admin/post_category",[adminPanelController::class,"post_category"])->name("post_category");
}); 