<?php

namespace App\Http\Controllers;

use App\Models\diner;
use Illuminate\Http\Request;

class DinerController extends Controller
{
    public function getDiner() {
        return response()->json(Diner::all(), 200);
    }
    public function getDinerById($id) {
        $diner = Diner::find($id);
        if(is_null($diner)) {
            return response()->json(['message' => 'Diner Not Found'], 404);
        }
        return response()->json($diner::find($id), 200);
    }

    public function addDiner(Request $request) {
        $diner = Diner::create($request->all());
        return response($diner, 201);
    }

    public function updateDiner(Request $request, $id) {
        $diner = Diner::find($id);
        if(is_null($diner)) {
            return response()->json(['message' => 'Diner Not Found'], 404);
        }
        $diner->update($request->all());
        return response($diner, 200);
    }

    public function deleteDiner(Request $request, $id) {
        $diner = Diner::find($id);
        if(is_null($diner)) {
            return response()->json(['message' => 'Diner Not Found'], 404);
        }
        $diner->delete();
        return response()->json(null, 204);
    }
}
