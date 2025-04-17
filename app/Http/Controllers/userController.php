<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use App\Models\Driver;
use Auth;
class userController extends Controller
{


    public function login(Request $request){

        $credentials=$request->only(["email","password"]);
        if(AUTH::attempt($credentials)){
             
            $user=Auth::user();
            $token=$user->createToken("Authtoken")->plainTextToken;
        
                    return response()->json([
                        "status"=>true,
                        "token"=>$token,
                        "message"=>"User Logged in succefully",
                        "data"=>$user
                    ]);
        }
        else{
            return response()->json([
                "status"=>false,
                "message"=>"Wrong Email or Password"
            ]);
        }
        
        }
        
        
        public function register(Request $request) {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
                'role' => 'required|in:client,admin,driver'
            ]);
        
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->password = bcrypt($request->password);
            $user->save();
        
            $token = $user->createToken("Authtoken")->plainTextToken;
            if ($user->role == 'client') {
                Client::create(['user_id' => $user->id]);
            } elseif ($user->role == 'driver') {
                Driver::create(['user_id' => $user->id]);
            }
            return response()->json([
                "status" => true,
                "token" => $token,
                "data" => $user
            ]);
        }
}
