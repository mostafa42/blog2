<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Register;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function create_account(Register $request)
    {
        $request["role"] = 3;
        $request["password"] = Hash::make($request->password);

        return $request ;
        create(User::class, $request->all());
        return response()->json(["msg" => "created successfully"]);
    }



    // public function login(Login $request)
    // {
    //     $credentials = $request->only('email', 'password');

    //     if (Auth::attempt($credentials)) {
    //         return redirect('dashboard');
    //     } else {
    //         return redirect()->back()->with("error", "invalid credentials !");
    //     }
    // }
    public function login(Request $request)
    {


        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['name'] =  $user->name;
            return response()->json([$success, 'User login successfully.']);
        } else {
            return response()->json(['Unauthorised.', ['error' => 'Unauthorised']]);
        }
    }
    public function logout()
    {

        $user = Auth::user();
        //delete user token for logout
        $user->tokens()->delete();

        // Revoke the token that was used to authenticate the current request...
        // Auth::user()->currentAccessToken()->delete();

        // Revoke a specific token...
        // $user->tokens()->where('id', $tokenId)->delete();
        
        return response()->json(['User logged out successfully.']);
    }
}
