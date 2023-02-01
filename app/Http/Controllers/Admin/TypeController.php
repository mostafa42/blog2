<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Type\Create;
use App\Http\Requests\Type\Update;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::get();


        return view('admin.documents.documents_types', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.documents.add') ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Create $request)
    {
        $request["type_code"] = $request->type_code;

        $request["type_description"] = [
            'ar' => $request->type_description_ar,
            'en' => $request->type_description_en
        ];

        $request["document_code"] = $request->document_code;

        $request["document_description"] = [
            'ar' => $request->document_description_ar,
            'en' => $request->document_description_en
        ];

        create(Type::class, $request->all('type_code' , 'type_description' , 'document_code' , 'document_description'));
        return redirect('types');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = Type::find($id);
        return view('admin.documents.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, $id)
    {
        $request["type_code"] = $request->type_code;
        $request["type_description"] = [
            'ar' => $request->type_description_ar,
            'en' => $request->type_description_en
        ];
        $request["document_code"] = $request->document_code;
        $request["document_description"] = [
            'ar' => $request->document_description_ar,
            'en' => $request->document_description_en
        ];
        update(Type::class, $id, $request->all('type_code' , 'type_description' , 'document_code' , 'document_description'));
        return redirect('/types')->with('message', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        delete(Type::class, $id);
        return redirect()->back();
    }
}