<?php

namespace App\Http\Controllers;

use App\Models\voiture;
use Illuminate\Http\Request;

class VoitureController extends Controller
{
    public function getVoiture() {
        return response()->json(Voiture::all(), 200);
    }
    public function getVoitureById($id) {
        $voiture = Voiture::find($id);
        if(is_null($voiture)) {
            return response()->json(['message' => 'Voiture Not Found'], 404);
        }
        return response()->json($voiture::find($id), 200);
    }

    public function addVoiture(Request $request) {
        $voiture = Voiture::create($request->all());
        return response($voiture, 201);
    }

    public function updateVoiture(Request $request, $id) {
        $voiture = Voiture::find($id);
        if(is_null($voiture)) {
            return response()->json(['message' => 'Voiture Not Found'], 404);
        }
        $voiture->update($request->all());
        return response($voiture, 200);
    }

    public function deleteVoiture(Request $request, $id) {
        $voiture = Voiture::find($id);
        if(is_null($voiture)) {
            return response()->json(['message' => 'Voiture Not Found'], 404);
        }
        $voiture->delete();
        return response()->json(null, 204);
    }

}
