<?php

namespace App\Http\Controllers;

use App\Models\package;
use Illuminate\Http\Request;
use App\Http\Controllers\ReservationController;
class PackageController extends Controller
{
    public function getPackage() {
        return response()->json(Package::all(), 200);
    }
    public function getPackageById($id) {
        $package = Package::find($id);
        if(is_null($package)) {
            return response()->json(['message' => 'Package Not Found'], 404);
        }
        return response()->json($package::find($id), 200);
    }

    public function addPackage(Request $request) {
        $package = Package::create($request->all());
        return response($package, 201);
    }

    public function updatePackage(Request $request, $id) {
        $package = Package::find($id);
        if(is_null($package)) {
            return response()->json(['message' => 'Package Not Found'], 404);
        }
        $package->update($request->all());
        return response($package, 200);
    }

    public function deletePackage(Request $request, $id) {
        $package = Package::find($id);
        if(is_null($package)) {
            return response()->json(['message' => 'Package Not Found'], 404);
        }
        $package->delete();
        return response()->json(null, 204);
    }
    public function lastpachage() {


        $maxres = app('App\Http\Controllers\ReservationController')->returnpac();

         $lastr= Package::find($maxres);
          return response()->json($lastr, 200);
    }
}
