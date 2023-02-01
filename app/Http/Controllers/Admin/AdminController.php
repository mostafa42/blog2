<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Create;
use App\Http\Requests\Auth\Register;
use App\Models\Admin;
use App\Models\Currency;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $role=Role::first();
            // Currency::create(['name'=>['en'=>'EGP','ar'=>'جنيه'],
            // 'from'=>now(),'to'=>now()]);
        $admins = Admin::admin()->get();
        
        return view("admin.admins.index" , compact('admins')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.admins.add") ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Create $request)
    {
        $request["password"] = Hash::make($request->password);
        $request["role"] = 2 ;
        $request["active"] = 1 ;
        $request["name"] = $request->name_ ;
        create(Admin::class , $request->all()) ;
        return redirect('admins');
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "hellos" ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
           
        return view("admin.admins.edit" , compact('admin')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Create $request, $id)
    {
        if(!$request->password){
            $request["password"] = Auth::user()->password ;
        }else{
            $request["password"] = Hash::make($request->password);
        }

        $request["name"] = $request->name_ ;
        update(User::class , $id , $request->all()) ;
        return redirect('admins');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        delete(Admin::class , $id) ;
        return redirect()->back() ;
    }
}
