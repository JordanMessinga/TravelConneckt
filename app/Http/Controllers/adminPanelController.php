<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Category;
use App\Models\City;
use App\Models\Trajet;
use Illuminate\Http\Request;

class adminPanelController extends Controller
{
    //
    public function show_dashboard(){
        return view("admin.dashboard");
    }
    public function show_trips(){
        $trips = Trajet::with("agency","category")->get();
        
        $categories =  Category::all();
        return view("admin.trip_list",["trips"=>$trips,"categories"=>$categories]);
    }
    public function create_trip(){
        $agencies =  Agency::with("city")->get();
        $categories =  Category::all();
        return view("admin.create_trip_list",["agencies"=>$agencies,"categories"=>$categories]);
    }
    public function post_trip(Request $request){
        $request->validate([
            "agency"=>" required",
            "departure"=>"string |required",
            "arrival"=>"string |required",
            "max_places"=>"numeric |required",
            "status"=>"string| required",
            "price"=>"numeric| required",
            "category"=>"string | required",
            'departure_date' => 'required|date_format:Y-m-d\TH:i'
        ]);
        $trip = new Trajet();
        $trip->id_agency = intval($request->agency);
        $trip->departure = $request->departure;
        $trip->arrival = $request->arrival;
        $trip->price = $request->price;
        $trip->id_category  = intval($request->category);
        $trip->status = intval($request->status);
        $trip->departure_date =  $request->departure_date;
        $trip->max_places = $request->max_places;
        $trip->save();
        return back()->withSuccess("element inserted successfully");
    }
    public function show_cities(){
        $cities = City::all();
        return view("admin.list_cities",["cities"=>$cities]);
    }
    public function create_city(){
        return view("admin.create_cities");
    }
    public function post_city(Request $request){
        $request->validate([
            "city_name"=>"string |required",
        ]);
        $city = new City();
        $city->name = $request->city_name;
        $city->save();
        return back()->withSuccess("element inserted successfully");
    }
    public function show_agencies(){
        $agencies = Agency::with("city")->get();
        return view("admin.list_agencies",["agencies"=>$agencies]);
    }
    public function create_agency(){
        $cities = City::all();
        return view("admin.create_agencies",["cities"=>$cities]);
    }
    public function post_agency(Request $request){
        $request->validate([
            "city"=>" required",
            "name"=>"string |required",
            "phone"=>"numeric |required",
            "email"=>"email |required",
        ]);
        $agency = new Agency();
        $agency->id_city = intval($request->city);
        $agency->name = $request->name;
        $agency->phone = $request->phone;
        $agency->email = $request->email;
        $agency->save();
        return back()->withSuccess("element inserted successfully");
    }
    public function create_category(){
        $agencies =  Agency::with("city")->get();
        $categories = Category::all();
        return view("admin.create_category",["agencies"=>$agencies]);
    }
    public function post_category(Request $request){
        $request->validate(["name"=>"string| required","agency"=>"string | required"]);
        $category = New Category();
        $category->name= $request->name;
        $category->id_agency = intval($request->agency);
        $category->save();
        return back()->withSuccess("category added successfully");
    }
}
