<?php

namespace App\Http\Controllers;

use App\Models\ziana;
use Illuminate\Http\Request;

class ZianaController extends Controller
{
    public function getZiana() {
        return response()->json(Ziana::all(), 200);
    }
    public function getZianaById($id) {
        $ziana = Ziana::find($id);
        if(is_null($ziana)) {
            return response()->json(['message' => 'Ziana Not Found'], 404);
        }
        return response()->json($ziana::find($id), 200);
    }

    public function addZiana(Request $request) {
        $ziana = Ziana::create($request->all());
        return response($ziana, 201);
    }

    public function updateZiana(Request $request, $id) {
        $ziana = Ziana::find($id);
        if(is_null($ziana)) {
            return response()->json(['message' => 'Ziana Not Found'], 404);
        }
        $ziana->update($request->all());
        return response($ziana, 200);
    }

    public function deleteZiana(Request $request, $id) {
        $ziana = Ziana::find($id);
        if(is_null($ziana)) {
            return response()->json(['message' => 'Ziana Not Found'], 404);
        }
        $ziana->delete();
        return response()->json(null, 204);
    }
}
