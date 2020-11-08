<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use Illuminate\Http\Request;

class PaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manage.paper.index');
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
            'side' => 'required',
        ]);

        $done = Paper::create([
            'title' => $request->title,
            'side' => $request->side,
            'user_id' => auth()->id(),
        ]);

        if($done) {
            return response()->json(['message' => 'Paper successfully added!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function show(Paper $paper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function edit(Paper $paper)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paper $paper)
    {
        $this->validate(request(), [
            'title' => 'required',
            'side' => 'required',
        ]);
        $paper->title = $request->title;
        $paper->side = $request->side;
        $done = $paper->save();
        if($done) {
            return response()->json(['message' => 'Paper successfully updated!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paper $paper)
    {
        if($paper->delete()){
            return response()->json(['Paper successfully deleted!']);
        }else {
            return response()->json(['something worng, please try again']);
        }
    }

    public function changeStatus(Paper $paper)
    {
        if($paper->status === 0) {
            $status = 1;
        }else{
            $status = 0;
        }

        $paper->status = $status;
        $done = $paper->save();
        if($done) {
        return response()->json(['Status successfully updated!']);
        }
    }
}
