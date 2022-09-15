<?php

namespace App\Http\Controllers;

use App\Models\fete_de_naissance;
use Illuminate\Http\Request;

class fete_de_naissanceController extends Controller
{
    public function getfete_de_naissance() {
        return response()->json(fete_de_naissance::all(), 200);
    }
    public function getfete_de_naissanceById($id) {
        $fete_de_naissance = fete_de_naissance::find($id);
        if(is_null($fete_de_naissance)) {
            return response()->json(['message' => 'fete_de_naissance Not Found'], 404);
        }
        return response()->json($fete_de_naissance::find($id), 200);
    }

    public function addfete_de_naissance(Request $request) {
        $fete_de_naissance = fete_de_naissance::create($request->all());
        return response($fete_de_naissance, 201);
    }

    public function updatefete_de_naissance(Request $request, $id) {
        $fete_de_naissance = fete_de_naissance::find($id);
        if(is_null($fete_de_naissance)) {
            return response()->json(['message' => 'fete_de_naissance Not Found'], 404);
        }
        $fete_de_naissance->update($request->all());
        return response($fete_de_naissance, 200);
    }

    public function deletefete_de_naissance(Request $request, $id) {
        $fete_de_naissance = fete_de_naissance::find($id);
        if(is_null($fete_de_naissance)) {
            return response()->json(['message' => 'fete_de_naissance Not Found'], 404);
        }
        $fete_de_naissance->delete();
        return response()->json(null, 204);
    }
}
