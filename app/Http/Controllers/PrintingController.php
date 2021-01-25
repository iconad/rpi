<?php

namespace App\Http\Controllers;

use App\Models\Printing;
use Illuminate\Http\Request;

class PrintingController extends Controller
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
            'body' => 'required',
            'delivery_time' => 'required',
        ]);

        $done = Printing::create([
            'title' => $request->title,
            'body' => $request->body,
            'delivery_time' => $request->delivery_time,
            'user_id' => auth()->id(),
        ]);

        if($done) {
            return response()->json(['message' => 'Printing successfully added!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Printing  $printing
     * @return \Illuminate\Http\Response
     */
    public function show(Printing $printing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Printing  $printing
     * @return \Illuminate\Http\Response
     */
    public function edit(Printing $printing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Printing  $printing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Printing $printing)
    {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
            'delivery_time' => 'required',
        ]);

        $printing->title = $request->title;
        $printing->body = $request->body;
        $printing->delivery_time = $request->delivery_time;
        $done = $printing->save();

        if($done) {
            return response()->json(['message' => 'Printing successfully updated!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Printing  $printing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Printing $printing)
    {
        if($printing->delete()){
            return response()->json(['Printing successfully deleted!']);
        }else {
            return response()->json(['something worng, please try again']);
        }
    }

    public function changeStatus($pid)
    {


        $printing = Printing::where('id', $pid)->first();

        if($printing->status === 0) {
            $status = 1;
        }else{
            $status = 0;
        }

        $printing->status = $status;
        $done = $printing->save();
        if($done) {
        return response()->json(['Status successfully updated!']);
        }
    }

}
