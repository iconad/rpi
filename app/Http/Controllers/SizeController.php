<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manage.size.index');
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
        $this->validate(request(), [
            'region' => 'required',
            'portrait' => 'required',
            'landscape' => 'required',
            'unit' => 'required',
            'type' => 'required',
            'content_types' => 'required',
        ]);

        $size = Size::create([
            'region' => $request->region,
            'portrait' => $request->portrait,
            'landscape' => $request->landscape,
            'unit' => $request->unit,
            'type' => $request->type,
            'user_id' => auth()->id(),
        ]);

        $size->menus()->sync($request->content_types);

        if($size) {
            return response()->json(['message' => 'Size successfully added!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $size)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size)
    {
        $this->validate(request(), [
            'region' => 'required',
            'portrait' => 'required',
            'landscape' => 'required',
            'unit' => 'required',
            'type' => 'required',
            'content_types' => 'required',
        ]);
        $size->region = $request->region;
        $size->type = $request->type;
        $size->content_types = $request->content_types;
        $size->portrait = $request->portrait;
        $size->landscape = $request->landscape;
        $size->unit = $request->unit;
        $done = $size->save();

        $size->menus()->sync($request->content_types);

        if($done) {
            return response()->json(['message' => 'Size successfully updated!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size)
    {
        if($size->delete()){
            return response()->json(['Size successfully deleted!']);
        }else {
            return response()->json(['something worng, please try again']);
        }
    }

    public function changeStatus(Size $size)
    {
        if($size->status === 0) {
            $status = 1;
        }else{
            $status = 0;
        }

        $size->status = $status;
        $done = $size->save();
        if($done) {
        return response()->json(['Status successfully updated!']);
        }
    }
}
