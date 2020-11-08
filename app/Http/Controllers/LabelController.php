<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manage.label/index');
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
            'color' => 'required'
        ]);

        $done = Label::create([
            'title' => $request->title,
            'color' => $request->color,
            'user_id' => auth()->id(),
        ]);


        if($done) {
            return response()->json(['message' => 'Label successfully added!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function show(Label $label)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function edit(Label $label)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Label $label)
    {
        $this->validate(request(), [
            'title' => 'required'
        ]);
        $label->title = $request->title;
        $label->color = $request->color;
        $done = $label->save();
        if($done) {
            return response()->json(['message' => 'Label successfully updated!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function destroy(Label $label)
    {
        if($label->delete()){
            return response()->json(['Label successfully deleted!']);
        }else {
            return response()->json(['something worng, please try again']);
        }
    }
}
