<?php

namespace App\Http\Controllers;

use App\Models\Finishing;
use Illuminate\Http\Request;

class FinishingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manage.finishing.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'body' => 'required',
            'delivery_time' => 'required',
        ]);

        $done = Finishing::create([
            'title' => $request->title,
            'body' => $request->body,
            'video_link' => $request->video_link,
            'delivery_time' => $request->delivery_time,
            'user_id' => auth()->id(),
        ]);

        if($done) {
            return response()->json(['message' => 'Finishing successfully added!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Finishing  $finishing
     * @return \Illuminate\Http\Response
     */
    public function show(Finishing $finishing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Finishing  $finishing
     * @return \Illuminate\Http\Response
     */
    public function edit(Finishing $finishing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Finishing  $finishing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Finishing $finishing)
    {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
            'delivery_time' => 'required',
        ]);

        $finishing->title = $request->title;
        $finishing->body = $request->body;
        $finishing->video_link = $request->video_link;
        $finishing->delivery_time = $request->delivery_time;
        $done = $finishing->save();

        if($done) {
            return response()->json(['message' => 'Finishing successfully updated!']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Finishing  $finishing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Finishing $finishing)
    {
        if($finishing->delete()){
            return response()->json(['Finishing successfully deleted!']);
        }else {
            return response()->json(['something worng, please try again']);
        }
    }

    public function changeStatus(Finishing $finishing)
    {
        if($finishing->status === 0) {
            $status = 1;
        }else{
            $status = 0;
        }

        $finishing->status = $status;
        $done = $finishing->save();
        if($done) {
        return response()->json(['Status successfully updated!']);
        }
    }
}
