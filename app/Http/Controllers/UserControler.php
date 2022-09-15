<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Auth;

class UserControler extends Controller
{
    public function register (Request $request){
        $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password)
        ]);
        $response['status'] = 1;
        $response ['message'] ='user regest succ';
        $response ['code']=200;
        return response()->json($response);

    }
    public function login(Request $request){
        $credentials = $request->only('email','password');
        try{
        if(!JWTAuth::attempt($credentials)){
            $response['status']= 0;
        $response['code']=401;
            $response['data']= null;
        $response['message']='Email or password is incorrect';
            return response()->json($response);

        }
        }catch(JWTException $e){
        $response['data']= null;
        $response['code']=500;
        $response['message']='not token';
            return response()->json($response);

        }
        $user = auth()->user();
        $data['token']= auth()->claims([
            'user_id'=>$user->id,
            'email'=>$user->email
        ])->attempt($credentials);
        $response['data']= $data;
        $response['status']= 1;
        $response['code']=200;
        $response['message']='login successfully';
        return response()->json($response);

    }

public function getUser() {
        return response()->json(User::all(), 200);
    }
   public  function getrole($email=null)
    {
        $user= User::find($email);
      //  $user = User::where('email',$email)->first();
        if(is_null($user)) {
            return response()->json(['message' => 'User Not Found'], 404);
        }
       //$role= $user->pluck('role');
        return response()->json($user, 200);

    }

}
