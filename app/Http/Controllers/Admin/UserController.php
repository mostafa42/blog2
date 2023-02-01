<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::user()->latest()->get();
        
        return view('admin.users.index' , compact('users')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function all_inactive_users()
    {
        $inactive_users = User::user()->inactive()->latest()->get();
        
        return view('admin.users.requests' , compact('inactive_users')) ;
    }

    public function active($id)
    {
        $request["active"] = 1;
        
        update(User::class , $id , $request) ;

        return redirect()->back();
    }

    public function in_active($id)
    {
        $request["active"] = 0;
        
        update(User::class , $id , $request) ;

        return redirect()->back();
    }

    public function active_all()
    {
        $inactive_users = User::user()->inactive()->get();
        $request["active"] = 1;
        foreach( $inactive_users as $user ){
            update(User::class , $user->id , $request) ;
        }

        return redirect()->back();
    }
}
