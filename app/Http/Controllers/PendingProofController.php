<?php

namespace App\Http\Controllers;

use App\Models\PendingProof;
use Illuminate\Http\Request;

class PendingProofController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pps = PendingProof::where('user_id', auth()->id())->get();
        return view('profile.proof.index', compact('pps'));
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
     * @param  \App\Models\PendingProof  $pendingProof
     * @return \Illuminate\Http\Response
     */
    public function show(PendingProof $pendingProof)
    {
        return view('profile.proof.show', compact('pendingProof'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PendingProof  $pendingProof
     * @return \Illuminate\Http\Response
     */
    public function edit(PendingProof $pendingProof)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PendingProof  $pendingProof
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PendingProof $pendingProof)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PendingProof  $pendingProof
     * @return \Illuminate\Http\Response
     */
    public function destroy(PendingProof $pendingProof)
    {
        //
    }
}
