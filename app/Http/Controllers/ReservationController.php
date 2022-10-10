<?php

namespace App\Http\Controllers;

use App\Models\reservation;
use App\Models\car;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function getreservation() {
        return response()->json(reservation::all(), 200);
    }
    public function getreservationById($id) {
        $reservation = reservation::find($id);
        if(is_null($reservation)) {
            return response()->json(['message' => 'reservation Not Found'], 404);
        }
        return response()->json($reservation::find($id), 200);
    }

    public function addreservation(Request $request,$id) {
        $reservation = reservation::create($request->all());
        $id=$reservation->id;
        return response($reservation, 201);
    }

    public function Reservation_car($name) {
        $car_id = $this->get_ID_car($name);
         $car = car::find($car_id);
         if($car->status == 'Unavailable'){
         $car->update(['status'=>'Available']);
     }
         else{
         $car->update(['status'=>'Unavailable']);}
         return response($car, 200);
    }

public function get_car_by_name($name) {
    $car = car::where('name','=', $name)->first();
    
    if(is_null($car)) {
        return response()->json(['message' => 'car Not Found'], 404);
    }
    return response()->json($car, 200);}


 public function get_ID_car($name) {
        $car = car::where('name','=', $name)->first();
        
        if(is_null($car)) {
            return response()->json(['message' => 'car Not Found'], 404);
        }
        $id = $car->id;
        return $id;
    }
    public function updatereservation(Request $request, $id) {
        $reservation = reservation::find($id);
        if(is_null($reservation)) {
            return response()->json(['message' => 'reservation Not Found'], 404);
        }
        $reservation->update($request->all());
        return response($reservation, 200);
    }

    public function deletereservation(Request $request, $id) {
        $reservation = reservation::find($id);
        if(is_null($reservation)) {
            return response()->json(['message' => 'reservation Not Found'], 404);
        }
        $reservation->delete();
        return response()->json(null, 204);
    }

    // public function getlastreservationId() {

    //     $maxValue = reservation::orderBy('id', 'desc')->value('id');

    //   // $reservationf= reservation::find($maxValue, ['id']);;
    //     return $maxValue;
    // }
    // public function lastcli() {

    //     $reservationf= reservation::find($this->getlastreservationId());
    //     return response()->json($reservationf, 200);
    // }
}
