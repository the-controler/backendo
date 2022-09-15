<?php

namespace App\Http\Controllers;

use App\Models\funeraire;
use Illuminate\Http\Request;

class FuneraireController extends Controller
{
    public function getFuneraire() {
        return response()->json(Funeraire::all(), 200);
    }
    public function getFuneraireById($id) {
        $funeraire = Funeraire::find($id);
        if(is_null($funeraire)) {
            return response()->json(['message' => 'Funeraire Not Found'], 404);
        }
        return response()->json($funeraire::find($id), 200);
    }

    public function addFuneraire(Request $request) {
        $funeraire = Funeraire::create($request->all());
        return response($funeraire, 201);
    }

    public function updateFuneraire(Request $request, $id) {
        $funeraire = Funeraire::find($id);
        if(is_null($funeraire)) {
            return response()->json(['message' => 'Funeraire Not Found'], 404);
        }
        $funeraire->update($request->all());
        return response($funeraire, 200);
    }

    public function deleteFuneraire(Request $request, $id) {
        $funeraire = Funeraire::find($id);
        if(is_null($funeraire)) {
            return response()->json(['message' => 'Funeraire Not Found'], 404);
        }
        $funeraire->delete();
        return response()->json(null, 204);
    }
}
