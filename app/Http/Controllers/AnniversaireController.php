<?php

namespace App\Http\Controllers;

use App\Models\anniversaire;
use Illuminate\Http\Request;

class AnniversaireController extends Controller
{
    public function getAnniversaire() {
        return response()->json(Anniversaire::all(), 200);
    }
    public function getAnniversaireById($id) {
        $anniversaire = Anniversaire::find($id);
        if(is_null($anniversaire)) {
            return response()->json(['message' => 'Anniversaire Not Found'], 404);
        }
        return response()->json($anniversaire::find($id), 200);
    }

    public function addAnniversaire(Request $request) {
        $anniversaire = Anniversaire::create($request->all());
        return response($anniversaire, 201);
    }

    public function updateAnniversaire(Request $request, $id) {
        $anniversaire = Anniversaire::find($id);
        if(is_null($anniversaire)) {
            return response()->json(['message' => 'Anniversaire Not Found'], 404);
        }
        $anniversaire->update($request->all());
        return response($anniversaire, 200);
    }

    public function deleteAnniversaire(Request $request, $id) {
        $anniversaire = Anniversaire::find($id);
        if(is_null($anniversaire)) {
            return response()->json(['message' => 'Anniversaire Not Found'], 404);
        }
        $anniversaire->delete();
        return response()->json(null, 204);
    }
    public function getAnnivId() {

        $maxValue = Anniversaire::orderBy('id', 'desc')->value('id');

     //  $An= Anniversaire::find($maxValue, ['id']);;
        return $maxValue;
    }
    public function lastaniv() {
        $An= Anniversaire::find($this->getAnnivId());;
        return response()->json($An, 200);
    }

}
