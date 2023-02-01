<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Login;
use App\Http\Requests\Auth\Register;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Register $request)
    {
        
    }
    
    public function sign_in(Request $request)
    {
        $credentials = $request->only('email' , 'password');

        if (auth('admin')->attempt($credentials)) {
            return redirect('dashboard') ;
        }else{
            return redirect()->back()->with("error" , "invalid credentials !") ;
        }
    }

    public function logout()
    {
        auth('admin')->logout();
        return redirect("/");
    }
    public function profile()
    {
      
        return view('admin.profile.index') ;
    }

    public function edit_profile()
    {
        return view('admin.profile.edit');
    }

    public function update_profile(Create $request)
    {
        $request["name"] = $request->name_ ;
        if(!$request->password){
            $request["password"] = auth('admin')->user()->password ;
            update(Admin::class , auth('admin')->user()->id , $request->all());
        }else{
            // check if old password compatible with my actual password ?
            if(  Hash::check($request->old_password , auth('admin')->user()->password) ){
                $request["password"] = Hash::make($request->password) ;
                
                update(Admin::class , auth('admin')->user()->id , $request->all());
            }else{
                return "old password is wrong" ;
            }
        }
        return redirect('profile');
    }
    
}
