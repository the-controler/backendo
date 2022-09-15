<?php

namespace App\Http\Controllers;

use App\Models\cameraman;
use Illuminate\Http\Request;

class CameramanController extends Controller
{
    public function getCameraman() {
        return response()->json(Cameraman::all(), 200);
    }
    public function getCameramanById($id) {
        $cameraman = Cameraman::find($id);
        if(is_null($cameraman)) {
            return response()->json(['message' => 'Cameraman Not Found'], 404);
        }
        return response()->json($cameraman::find($id), 200);
    }

    public function addCameraman(Request $request) {
        $cameraman = Cameraman::create($request->all());
        return response($cameraman, 201);
    }

    public function updateCameraman(Request $request, $id) {
        $cameraman = Cameraman::find($id);
        if(is_null($cameraman)) {
            return response()->json(['message' => 'Cameraman Not Found'], 404);
        }
        $cameraman->update($request->all());
        return response($cameraman, 200);
    }

    public function deleteCameraman(Request $request, $id) {
        $cameraman = Cameraman::find($id);
        if(is_null($cameraman)) {
            return response()->json(['message' => 'Cameraman Not Found'], 404);
        }
        $cameraman->delete();
        return response()->json(null, 204);
    }
}
