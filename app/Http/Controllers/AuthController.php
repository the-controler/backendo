<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Contracts\JWTSubject;

class AuthController extends Controller
{
    public function register (Request $request){
        $user = User::create([
        'first_name'=>$request->first_name,
        'last_name'=>$request->last_name,
        'card_id_or_passeport'=>$request->card_id_or_passeport,
        'phone'=>$request->phone,
        'driving_license'=>$request->driving_license,
        'age'=>$request->age,
        'role'=>$request->role,
        'username'=>$request->username,
        'password' => bcrypt($request->password)
        ]);
        $response['status'] = 1;
        $response ['message'] ='user regest succ';
        $response ['code']=200;
        return response()->json($response);

    }
    
    public function login(Request $request){
        $credentials = $request->only('username','password');
        try{
        if(!JWTAuth::attempt($credentials)){
            $response['status']= 0;
        $response['code']=401;
            $response['data']= null;
        $response['message']='username or password is incorrect';
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
            'username'=>$user->username
        ])->attempt($credentials);
        $response['data']= $data;
        $response['status']= 1;
        $response['code']=200;
        $response['message']='login successfully';
        return response()->json($response);

    }

    public function get_username_jwt(Request $request)
    {$token=$request->token;
        //$token = JWTAuth::getToken();
        
        $apy = JWTAuth::getPayload($token)->toArray();
        return $apy;
    }




    //add just befor the last }
     // Rest omitted for brevity
 
     /**
      * Get the identifier that will be stored in the subject claim of the JWT.
      *
      * @return mixed
      */
     public function getJWTIdentifier()
     {
         return $this->getKey();
     }
 
     /**
      * Return a key value array, containing any custom claims to be added to the JWT.
      *
      * @return array
      */
     public function getJWTCustomClaims()
     {
         return [];
     }




     public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()->name
        ]);
    }
}
