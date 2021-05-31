<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Product;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Carousel::get()->all();
        return view('manage.carousel.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::where('status', 1)->get();
        return view('manage.carousel.create', compact('products'));
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
     * @param  \App\Models\carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function show(carousel $carousel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function edit(carousel $carousel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, carousel $carousel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function destroy(carousel $carousel)
    {
        //
    }
}
