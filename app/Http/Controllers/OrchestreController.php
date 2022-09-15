<?php

namespace App\Http\Controllers;

use App\Models\orchestre;
use Illuminate\Http\Request;

class OrchestreController extends Controller
{
    public function getOrchestre() {
        return response()->json(Orchestre::all(), 200);
    }
    public function getOrchestreById($id) {
        $orchestre = Orchestre::find($id);
        if(is_null($orchestre)) {
            return response()->json(['message' => 'Orchestre Not Found'], 404);
        }
        return response()->json($orchestre::find($id), 200);
    }

    public function addOrchestre(Request $request) {
        $orchestre = Orchestre::create($request->all());
        return response($orchestre, 201);
    }

    public function updateOrchestre(Request $request, $id) {
        $orchestre = Orchestre::find($id);
        if(is_null($orchestre)) {
            return response()->json(['message' => 'Orchestre Not Found'], 404);
        }
        $orchestre->update($request->all());
        return response($orchestre, 200);
    }

    public function deleteOrchestre(Request $request, $id) {
        $orchestre = Orchestre::find($id);
        if(is_null($orchestre)) {
            return response()->json(['message' => 'Orchestre Not Found'], 404);
        }
        $orchestre->delete();
        return response()->json(null, 204);
    }
    public function file(Request $request) {
            $File= new Orchestre; // the model name
            if ($request->hasFile('photo')){//image is the type of the data
            $completeFileName = $request->file('photo')->getClientOriginalName();// to get the name of the file
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);// to get only the name of the file with no exetention
            $extenshion = $request->file('photo')->getClientOriginalExtension();//to get only the extention
            $getprice = $request->input('Price');
           $compPic = str_replace(' ', '_' , $fileNameOnly ).'-'.rand().'_'.time().'.'.$extenshion;

          $path = $request->file('photo')->storeAs('public/orchestre', $compPic);
            $File->photo= $compPic;
            $File->Price = $getprice;
          // dd($getprice);
            }
            if ($File->save()){
            return ['status'=>true,'message'=>'Done with no problem'];
            }else{
            return ['status'=>false,'message'=>'We have problem'];
            }
            }

        }

