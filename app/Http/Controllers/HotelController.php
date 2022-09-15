<?php

namespace App\Http\Controllers;

use App\Models\hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function getHotel() {
    return response()->json(Hotel::all(), 200);
}
public function getHotelById($id) {
    $hotel = Hotel::find($id);
    if(is_null($hotel)) {
        return response()->json(['message' => 'Hotel Not Found'], 404);
    }
    return response()->json($hotel::find($id), 200);
}

public function addHotel(Request $request) {
    $hotel = Hotel::create($request->all());
    return response($hotel, 201);
}

public function updateHotel(Request $request, $id) {
    $hotel = Hotel::find($id);
    if(is_null($hotel)) {
        return response()->json(['message' => 'Hotel Not Found'], 404);
    }
    $hotel->update($request->all());
    return response($hotel, 200);
}

public function deleteHotel(Request $request, $id) {
    $hotel = Hotel::find($id);
    if(is_null($hotel)) {
        return response()->json(['message' => 'Hotel Not Found'], 404);
    }
    $hotel->delete();
    return response()->json(null, 204);
}
}
