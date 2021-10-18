<?php

namespace App\Http\Controllers;

use App\Models\PackagePriceSizesPrice;
use Illuminate\Http\Request;

class PackagePriceSizesPriceController extends Controller
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
     * @param  \App\Models\PackagePriceSizesPrice  $packagePriceSizesPrice
     * @return \Illuminate\Http\Response
     */
    public function show(PackagePriceSizesPrice $packagePriceSizesPrice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PackagePriceSizesPrice  $packagePriceSizesPrice
     * @return \Illuminate\Http\Response
     */
    public function edit(PackagePriceSizesPrice $packagePriceSizesPrice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PackagePriceSizesPrice  $packagePriceSizesPrice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PackagePriceSizesPrice $packagePriceSizesPrice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PackagePriceSizesPrice  $packagePriceSizesPrice
     * @return \Illuminate\Http\Response
     */
    public function destroy($packagePriceSizesPrice)
    {
        $ppsp = PackagePriceSizesPrice::where('id', $packagePriceSizesPrice)->first();
        if($ppsp->delete()){
            return response()->json(['Finishing successfully deleted!']);
        }else {
            return response()->json(['something worng, please try again']);
        }
    }
}
