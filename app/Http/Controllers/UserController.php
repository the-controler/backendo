<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getuser() {
        $user = user::where('role', 'client')->get();
        return response()->json($user, 200);
    }
    public function getuserById($id) {
        $client = [$id,'client'];
        $user = user::find($client);
        if(is_null($user)) {
            return response()->json(['message' => 'user Not Found'], 404);
        }
        return response()->json($user, 200);
    }

    public function updateuser(Request $request, $id) {
    
        $user = user::find($id);
            if(is_null($user)) {
        return response()->json(['message' => 'user Not Found'], 404);
    }
    $user->update(
        [
                'first_name'=>$request->first_name,
                 'last_name'=>$request->last_name,
                 'card_id_or_passeport'=>$request->card_id_or_passeport,
                 'phone'=>$request->phone,
                 'driving_license'=>$request->driving_license,
                 'age'=>$request->age,
                 'username'=>$request->username,
                 'password' => bcrypt($request->password)
             ]
    );
    return response($user, 200);
    }

    public function deleteuser(Request $request, $id) {
        $user = user::find($id);
        if(is_null($user)) {
            return response()->json(['message' => 'user Not Found'], 404);
        }else if($user->role == 'client'){
            $user->delete();
            return response()->json(null, 204);
                }
                return response()->json(['message' => 'no user here'], 404);
       
    }

    // public function getlastuserId() {

    //     $maxValue = user::orderBy('id', 'desc')->value('id');

    //   // $userf= user::find($maxValue, ['id']);;
    //     return $maxValue;
    // }
    // public function lastuser() {

    //     $userf= user::find($this->getlastuserId());
    //     return response()->json($userf, 200);
    // }
}
