<?php

namespace App\Http\Controllers;

use App\Models\pack_basic;
use Illuminate\Http\Request;

class PackBasicController extends Controller
{
    public function getPackBasic() {
        return response()->json(Pack_Basic::all(), 200);
    }
    public function getPackBasicById($id) {
        $packBasic = Pack_Basic::find($id);
        if(is_null($packBasic)) {
            return response()->json(['message' => 'PackBasic Not Found'], 404);
        }
        return response()->json($packBasic::find($id), 200);
    }

    public function addPackBasic(Request $request) {
        $packBasic = Pack_Basic::create($request->all());
        return response($packBasic, 201);
    }

    public function updatePackBasic(Request $request, $id) {
        $packBasic = Pack_Basic::find($id);
        if(is_null($packBasic)) {
            return response()->json(['message' => 'PackBasic Not Found'], 404);
        }
        $packBasic->update($request->all());
        return response($packBasic, 200);
    }

    public function deletePackBasic(Request $request, $id) {
        $packBasic = Pack_Basic::find($id);
        if(is_null($packBasic)) {
            return response()->json(['message' => 'PackBasic Not Found'], 404);
        }
        $packBasic->delete();
        return response()->json(null, 204);
    }
}
