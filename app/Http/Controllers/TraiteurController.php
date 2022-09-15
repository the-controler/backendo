<?php

namespace App\Http\Controllers;

use App\Models\traiteur;
use Illuminate\Http\Request;

class TraiteurController extends Controller
{
    public function getTraiteur() {
        return response()->json(Traiteur::all(), 200);
    }
    public function getTraiteurById($id) {
        $traiteur = Traiteur::find($id);
        if(is_null($traiteur)) {
            return response()->json(['message' => 'Traiteur Not Found'], 404);
        }
        return response()->json($traiteur::find($id), 200);
    }

    public function addTraiteur(Request $request) {
        $traiteur = Traiteur::create($request->all());
        return response($traiteur, 201);
    }

    public function updateTraiteur(Request $request, $id) {
        $traiteur = Traiteur::find($id);
        if(is_null($traiteur)) {
            return response()->json(['message' => 'Traiteur Not Found'], 404);
        }
        $traiteur->update($request->all());
        return response($traiteur, 200);
    }

    public function deleteTraiteur(Request $request, $id) {
        $traiteur = Traiteur::find($id);
        if(is_null($traiteur)) {
            return response()->json(['message' => 'Traiteur Not Found'], 404);
        }
        $traiteur->delete();
        return response()->json(null, 204);
    }

}
