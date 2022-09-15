<?php

namespace App\Http\Controllers;

use App\Models\fetetype;
use Illuminate\Http\Request;

class FetetypeController extends Controller
{
    public function getFetetype() {
        return response()->json(Fetetype::all(), 200);
    }
    public function getFetetypeById($id) {
        $fetetype = Fetetype::find($id);
        if(is_null($fetetype)) {
            return response()->json(['message' => 'Fetetype Not Found'], 404);
        }
        return response()->json($fetetype::find($id), 200);
    }

    public function addFetetype(Request $request) {
        $fetetype = Fetetype::create($request->all());
        return response($fetetype, 201);
    }

    public function updateFetetype(Request $request, $id) {
        $fetetype = Fetetype::find($id);
        if(is_null($fetetype)) {
            return response()->json(['message' => 'Fetetype Not Found'], 404);
        }
        $fetetype->update($request->all());
        return response($fetetype, 200);
    }

    public function deleteFetetype(Request $request, $id) {
        $fetetype = Fetetype::find($id);
        if(is_null($fetetype)) {
            return response()->json(['message' => 'Fetetype Not Found'], 404);
        }
        $fetetype->delete();
        return response()->json(null, 204);
    }

}
