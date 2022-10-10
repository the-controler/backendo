<?php

namespace App\Http\Controllers;

use App\Models\car_image;
use Illuminate\Http\Request;

class CarImageController extends Controller
{
    public function get_all_car_image() {
        return response()->json(car_image::all(), 200);
    }
    public function get_car_image_by_name($name) {
        $car = car_image::where('car_name','=', $name)->get();
        
        if(is_null($car)) {
            return response()->json(['message' => 'car Not Found'], 404);
        }
        return response()->json($car, 200);
    }

    public function getcar_imageById($id) {
        $car_image = car_image::find($id);
        if(is_null($car_image)) {
            return response()->json(['message' => 'car_image Not Found'], 404);
        }
        return response()->json($car_image::find($id), 200);
    }

    public function addcar_image(Request $request) {
        $car_image = car_image::create($request->all());
        return response($car_image, 201);
    }

    public function updatecar_image(Request $request, $id) {
        $car_image = car_image::find($id);
        if(is_null($car_image)) {
            return response()->json(['message' => 'car_image Not Found'], 404);
        }
        $car_image->update($request->all());
        return response($car_image, 200);
    }

    public function deletecar_image(Request $request, $id) {
        $car_image = car_image::find($id);
        if(is_null($car_image)) {
            return response()->json(['message' => 'car_image Not Found'], 404);
        }
        $car_image->delete();
        return response()->json(null, 204);
    }
}
