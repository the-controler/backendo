<?php

namespace App\Http\Controllers;

use App\Models\mariage;
use Illuminate\Http\Request;

class MariageController extends Controller
{
    public function getMariage() {
        return response()->json(Mariage::all(), 200);
    }
    public function getMariageById($id) {
        $mariage = Mariage::find($id);
        if(is_null($mariage)) {
            return response()->json(['message' => 'Mariage Not Found'], 404);
        }
        return response()->json($mariage::find($id), 200);
    }

    public function addMariage(Request $request) {
        $mariage = Mariage::create($request->all());
        return response($mariage, 201);
    }

    public function updateMariage(Request $request, $id) {
        $mariage = Mariage::find($id);
        if(is_null($mariage)) {
            return response()->json(['message' => 'Mariage Not Found'], 404);
        }
        $mariage->update($request->all());
        return response($mariage, 200);
    }

    public function deleteMariage(Request $request, $id) {
        $mariage = Mariage::find($id);
        if(is_null($mariage)) {
            return response()->json(['message' => 'Mariage Not Found'], 404);
        }
        $mariage->delete();
        return response()->json(null, 204);
    }

}
