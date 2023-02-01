<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Province\Create;
use App\Http\Requests\Province\Update;
use App\Models\Province;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::get();

        return view('admin.provinces.province', compact('provinces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View("admin.provinces.add") ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Create $request)
    {
        $request["province_code"] = $request->province_code;
        $request["province_name"] = [
            'ar' => $request->province_name_ar ,
            'en' => $request->province_name_en
        ];
        
        create(Province::class, $request->all('province_code' , 'province_name'));
        return redirect('provinces');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function show(Province $province)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $province = Province::find($id);
        return view('admin.provinces.edit', compact('province'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, $id)
    {
        $request["province_code"] = $request->province_code;
        $request["province_name"] = [
            'ar' => $request->province_name_ar ,
            'en' => $request->province_name_en
        ];
        
        update(Province::class, $id, $request->all('province_code' , 'province_name'));
        return redirect('/provinces')->with('message', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        delete(Province::class, $id);
        return redirect()->back();
    }
}