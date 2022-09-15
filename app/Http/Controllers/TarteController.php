<?php

namespace App\Http\Controllers;

use App\Models\tarte;
use Illuminate\Http\Request;

class TarteController extends Controller
{
    public function getTarte() {
        return response()->json(Tarte::all(), 200);
    }
    public function getTarteById($id) {
        $tarte = Tarte::find($id);
        if(is_null($tarte)) {
            return response()->json(['message' => 'Tarte Not Found'], 404);
        }
        return response()->json($tarte::find($id), 200);
    }

    public function addTarte(Request $request) {
        $tarte = Tarte::create($request->all());
        return response($tarte, 201);
    }

    public function updateTarte(Request $request, $id) {
        $tarte = Tarte::find($id);
        if(is_null($tarte)) {
            return response()->json(['message' => 'Tarte Not Found'], 404);
        }
        $tarte->update($request->all());
        return response($tarte, 200);
    }

    public function deleteTarte(Request $request, $id) {
        $tarte = Tarte::find($id);
        if(is_null($tarte)) {
            return response()->json(['message' => 'Tarte Not Found'], 404);
        }
        $tarte->delete();
        return response()->json(null, 204);
    }
}
