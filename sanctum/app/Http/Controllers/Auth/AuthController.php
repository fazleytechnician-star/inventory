<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    // login untuk login
    // this function akan process email dan password user
    // this function akan keluarkan sanctum token
    // this function akan keluarkan response

    public function login(Request $request){

        // validate the email are password
        // email and password are required
         $request->validate([
            'email' => 'required email', // not fazliwork, must be fazley.technician@gmail.com
            'password' => 'required'
        ]);
        
        // chat user wujud atau di di dalam database
        // || = or
        // && = and

        $user = User::where('email', $request->email)->first(); // dapatkan object user
        // dd($user);
        // kalau user tak wujud dan passowrd mismatch,apa yang akan berlaku
        // akan user mesej,"user is not authenticated"
        if(!$user || Hash::check($request->password,$user->password){
           return response()=>json('user is not authenticated');
        }
        // after everything is ok,create the user token

        // dapatkan user object dan seterusnya create sanctum Token
        $token =$user->createToken('api-token')->plainTextToken;

        // return user data and the user's Api/Bearer token
        return Response()->json([
            'user' => $user,
            'token' => $token

        ]);


}
