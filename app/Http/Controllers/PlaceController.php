<?php

namespace App\Http\Controllers;

use App\Models\place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function get_all_place() {
        return response()->json(place::all(), 200);
    }
    public function getplaceById($id) {
        $place = place::find($id);
        if(is_null($place)) {
            return response()->json(['message' => 'place Not Found'], 404);
        }
        return response()->json($place::find($id), 200);
    }

    public function addplace(Request $request) {
        $place = place::create($request->all());
        return response($place, 201);
    }

    public function updateplace(Request $request, $id) {
        $place = place::find($id);
        if(is_null($place)) {
            return response()->json(['message' => 'place Not Found'], 404);
        }
        $place->update($request->all());
        return response($place, 200);
    }

    public function deleteplace(Request $request, $id) {
        $place = place::find($id);
        if(is_null($place)) {
            return response()->json(['message' => 'place Not Found'], 404);
        }
        $place->delete();
        return response()->json(null, 204);
    }
}
