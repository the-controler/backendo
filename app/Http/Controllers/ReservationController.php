<?php

namespace App\Http\Controllers;

use App\Models\reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\AnniversaireController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PackageController;

class ReservationController extends Controller
{


    public function getReservation() {
        return response()->json(Reservation::all(), 200);
    }
    public function getReservationById($id) {
        $reservation = Reservation::find($id);
        if(is_null($reservation)) {
            return response()->json(['message' => 'Reservation Not Found'], 404);
        }
        return response()->json($reservation::find($id), 200);
    }

    public function addReservation(Request $request) {
        $reservation = Reservation::create($request->all());
        return response($reservation, 201);
    }

    public function updateReservation(Request $request, $id) {
        $reservation = Reservation::find($id);
        if(is_null($reservation)) {
            return response()->json(['message' => 'Reservation Not Found'], 404);
        }
        $reservation->update($request->all());
        return response($reservation, 200);
    }

    public function deleteReservation(Request $request, $id) {
        $reservation = Reservation::where('id', $id);
        if(is_null($reservation)) {
            return response()->json(['message' => 'Reservation Not Found'], 404);
        }
        $reservation->delete();
        return response()->json(null, 204);
    }
    public function basicreservaniv() {
         $IDF=app('App\Http\Controllers\AnniversaireController')->getAnnivId();
         $IDC =app('App\Http\Controllers\ClientController')->getClientId();
        $anniversaire = Reservation::create([
            'id_client' => $IDC,
            'id_package' => 1,
            'id_fetetype' => 2,
            'id_res_fete' => $IDF,

        ]);
        return response($anniversaire, 201);
    }
    public function proreservaniv() {
        $IDF=app('App\Http\Controllers\AnniversaireController')->getAnnivId();
        $IDC =app('App\Http\Controllers\ClientController')->getClientId();
       $anniversaire = Reservation::create([
           'id_client' => $IDC,
           'id_package' => 2,
           'id_fetetype' => 2,
           'id_res_fete' => $IDF,

       ]);
       return response($anniversaire, 201);
   }
    public function lastres() {
        $maxValue = Reservation::orderBy('id', 'desc')->value('id');

         $lastr= Reservation::find($maxValue);;
          return response()->json($lastr, 200);
    }
    public function returnpac() {
        $maxValue = Reservation::orderBy('id', 'desc')->value('id_package');

        // $lastr= Reservation::find($maxValue);;
          return $maxValue;
    }
}
