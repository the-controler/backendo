<?php

namespace App\Http\Controllers;

use App\Models\lebsa;
use Illuminate\Http\Request;

class LebsaController extends Controller
{
    public function getLebsa() {
        return response()->json(Lebsa::all(), 200);
    }
    public function getLebsaById($id) {
        $lebsa = Lebsa::find($id);
        if(is_null($lebsa)) {
            return response()->json(['message' => 'Lebsa Not Found'], 404);
        }
        return response()->json($lebsa::find($id), 200);
    }

    public function addLebsa(Request $request) {
        $lebsa = Lebsa::create($request->all());
        return response($lebsa, 201);
    }

    public function updateLebsa(Request $request, $id) {
        $lebsa = Lebsa::find($id);
        if(is_null($lebsa)) {
            return response()->json(['message' => 'Lebsa Not Found'], 404);
        }
        $lebsa->update($request->all());
        return response($lebsa, 200);
    }

    public function deleteLebsa(Request $request, $id) {
        $lebsa = Lebsa::find($id);
        if(is_null($lebsa)) {
            return response()->json(['message' => 'Lebsa Not Found'], 404);
        }
        $lebsa->delete();
        return response()->json(null, 204);
    }

}
