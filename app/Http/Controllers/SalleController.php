<?php

namespace App\Http\Controllers;

use App\Models\salle;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    public function getSalle() {
        return response()->json(Salle::all(), 200);
    }
    public function getSalleById($id) {
        $salle = Salle::find($id);
        if(is_null($salle)) {
            return response()->json(['message' => 'Salle Not Found'], 404);
        }
        return response()->json($salle::find($id), 200);
    }

    public function addSalle(Request $request) {
        $salle = Salle::create($request->all());
        return response($salle, 201);
    }

    public function updateSalle(Request $request, $id) {
        $salle = Salle::find($id);
        if(is_null($salle)) {
            return response()->json(['message' => 'Salle Not Found'], 404);
        }
        $salle->update($request->all());
        return response($salle, 200);
    }

    public function deleteSalle(Request $request, $id) {
        $salle = Salle::find($id);
        if(is_null($salle)) {
            return response()->json(['message' => 'Salle Not Found'], 404);
        }
        $salle->delete();
        return response()->json(null, 204);
    }
}
