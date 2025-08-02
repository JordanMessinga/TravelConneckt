<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\City;
use App\Models\Reservation;
use App\Models\Trajet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;

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

public function show_reservations(){
    $iduser = Auth::user()->id;
    $reservations = Reservation::where("id_user",$iduser)->with("trajet")->get();
    $cities = City::all();
    return view('reservations',["reservations"=>$reservations,"cities"=>$cities]);
}

public function createReservation(Request $request, $id){
    // Validate the request
    $request->validate([
        'full_name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'num_tickets' => 'required|integer|min:1',
    ]);
    
    // Check if user is authenticated
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'You must be logged in to make a reservation');
    }
    
    // Check if trajet exists
    $trajet = Trajet::find($id);
    if (!$trajet) {
        return redirect()->route('home')->with('error', 'Trip not found');
    }
    
    // Create the reservation
    $reservation = new Reservation();
    $reservation->id_user = Auth::user()->id;
    $reservation->id_trajet = $id;
    $reservation->save();
    
    return redirect()->route('reservations')->with('success', 'Reservation created successfully!');
}

public function downloadTicket($id)
{
    // Check if user is authenticated
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'You must be logged in to download tickets');
    }
    
    // Find the reservation
    $reservation = Reservation::with(['trajet.agency', 'trajet.category'])->find($id);
    
    // Check if reservation exists and belongs to the current user
    if (!$reservation || $reservation->id_user != Auth::user()->id) {
        return redirect()->route('reservations')->with('error', 'Ticket not found or unauthorized');
    }
    
    // Generate PDF
    $pdf = PDF::loadView('pdf.ticket', [
        'reservation' => $reservation,
        'user' => Auth::user()
    ]);
    
    // Set PDF options
    $pdf->setPaper('a4', 'portrait');
    
    // Download the PDF
    return $pdf->download('ticket-' . $reservation->id . '.pdf');
}

public function showProfile()
{
    // Check if user is authenticated
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'You must be logged in to view your profile');
    }
    
    return view('my_profile');
}

public function updateProfile(Request $request)
{
    // Validate the request
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:500',
    ]);
    
    // Update the user
    $user = Auth::user();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->address = $request->address;
    $user->save();
    
    return redirect()->route('profile')->with('success', 'Profile updated successfully!');
}

public function updatePassword(Request $request)
{
    // Validate the request
    $request->validate([
        'current_password' => 'required|string',
        'password' => 'required|string|min:8|confirmed',
    ]);
    
    // Check if current password is correct
    if (!Hash::check($request->current_password, Auth::user()->password)) {
        return redirect()->route('profile')
            ->with('error', 'Current password is incorrect')
            ->withErrors(['current_password' => 'Current password is incorrect']);
    }
    
    // Update the password
    $user = Auth::user();
    $user->password = Hash::make($request->password);
    $user->save();
    
    return redirect()->route('profile')->with('success', 'Password updated successfully!');
}

}