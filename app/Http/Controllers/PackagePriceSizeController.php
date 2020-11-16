<?php

namespace App\Http\Controllers;

use App\Models\PackagePriceSize;
use Illuminate\Http\Request;

class PackagePriceSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\PackagePriceSize  $packagePriceSize
     * @return \Illuminate\Http\Response
     */
    public function show(PackagePriceSize $packagePriceSize)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PackagePriceSize  $packagePriceSize
     * @return \Illuminate\Http\Response
     */
    public function edit(PackagePriceSize $packagePriceSize)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PackagePriceSize  $packagePriceSize
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PackagePriceSize $packagePriceSize)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PackagePriceSize  $packagePriceSize
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $packagePriceSize = PackagePriceSize::where('id', $id)->first();
        if($packagePriceSize->delete()){
            return response()->json(['Successfully deleted!']);
        }else {
            return response()->json(['something worng, please try again']);
        }
    }
}
