<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manage.material.index');
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
            'title' => 'required',
        ]);

        $done = Material::create([
            'title' => $request->title,
            'body' => $request->body,
            'min' => $request->min,
            'max' => $request->max,
            'excerpt' => $request->excerpt,
        ]);


        if($done) {
            return response()->json(['message' => 'Material successfully added!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        $this->validate(request(), [
            'title' => 'required'
        ]);

        $material->title = $request->title;
        $material->min = $request->min;
        $material->max = $request->max;
        $material->excerpt = $request->excerpt;
        $material->body = $request->body;

        if($material->save()) {
            return response()->json(['message' => 'Material successfully updated!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        if($material->delete()){
            return response()->json(['Material successfully deleted!']);
        }else {
            return response()->json(['something worng, please try again']);
        }
    }
}
