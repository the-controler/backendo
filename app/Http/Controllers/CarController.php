<?php

namespace App\Http\Controllers;

use App\Models\car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function get_all_car() {
        return response()->json(car::all(), 200);
    }
    public function get_Available_car() {
        return response()->json(car::where('status', 'Available')->get(), 200);
    }
    public function getcarById($id) {
        $car = car::find($id);
        if(is_null($car)) {
            return response()->json(['message' => 'car Not Found'], 404);
        }
        return response()->json($car::find($id), 200);
    }

    public function addcar(Request $request) {
        $car = car::create($request->all());
        return response($car, 201);
    }

    public function updatecar(Request $request, $id) {
        $car = car::find($id);
        if(is_null($car)) {
            return response()->json(['message' => 'car Not Found'], 404);
        }
        $car->update($request->all());
        return response($car, 200);
    }

    public function deletecar(Request $request, $id) {
        $car = car::find($id);
        if(is_null($car)) {
            return response()->json(['message' => 'car Not Found'], 404);
        }
        $car->delete();
        return response()->json(null, 204);
    }
}
