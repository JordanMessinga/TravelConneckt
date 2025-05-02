<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\City;
use App\Models\Trajet;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    //
public function show_homepage(){
        $cities = City::all();
        $trips = Trajet::with("category","agency")->limit(20)->get();
        $filteredTrips = [];
        $agencies = Agency::all();
        return view("homePage",["cities"=>$cities,"trips"=>$trips,"ftrips"=>$filteredTrips, "agencies"=>$agencies]);
    
}
public function filterTrips(Request $request){
    $request->validate([
        "from"=>"required|string",
        "to"=>"required|string",
        "date"=>"date",
    ]);
    $cities = City::all();
    $agencies = Agency::all();
    $trips = Trajet::with("category","agency")->limit(20)->get();
    $filteredTrips = Trajet::whereDate("departure_date",$request->date)
    ->where("departure",$request->from)
    ->where("arrival",$request->to)->get();
    
    return view("homePage",["cities"=>$cities,"trips"=>$trips,"ftrips"=>$filteredTrips, "agencies"=>$agencies]);

}

public function showdetails($id){

    $trajet = Trajet::where("id",$id)->with("agency", "category")->first();
    $cities = City::all();
    return view("traject_details", ["trajet"=>$trajet, "cities"=>$cities]);
}


public function showmobilepaiement($id){

    $trajet = Trajet::where("id",$id)->with("agency", "category")->first();
    $cities = City::all();
    return view("mobilepaiement", ["trajet"=>$trajet, "cities"=>$cities]);
}

public function showcardpaiement($id){

    $trajet = Trajet::where("id",$id)->with("agency", "category")->first();
    $cities = City::all();
    return view("cardpaiement", ["trajet"=>$trajet, "cities"=>$cities]);
}


}