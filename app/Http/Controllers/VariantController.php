<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Variant;
use App\Models\Product;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $variants = Variant::where('product_id', $product->id)->get();
        return view('manage.product.variant.index', compact('product', 'variants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        $colors = Color::all();
        return view('manage.product.variant.create', compact('product', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $this->validate(request(), [
            'title' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);


        $variant = Variant::create([
            'title' => $request->title,
            'short_title' => $request->short_title,
            'stock' => $request->stock,
            'price' => $request->price,
            'color_id' => $request->color,
            'product_id' => $product->id,
            'user_id' => auth()->id(),
        ]);

        if ($variant) {
            $request->session()->flash('green', 'Variant was successful added!');
            return redirect("/manage/products/".$product->id."/variants/".$variant->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Variant  $variant
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, Variant $variant)
    {
        $colors = Color::all();
        return view('manage.product.variant.show', compact('product','variant', 'colors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Variant  $variant
     * @return \Illuminate\Http\Response
     */
    public function edit(Variant $variant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Variant  $variant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, Variant $variant)
    {
        $variant->title = $request->title;
        $variant->short_title = $request->short_title;
        $variant->stock = $request->stock;
        $variant->price = $request->price;
        $variant->color_id = $request->color;
        if ($variant->save()) {
            $request->session()->flash('green', 'Variant was successful updated!');
            return redirect("/manage/products/".$product->id."/variants/".$variant->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Variant  $variant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product, Variant $variant)
    {
        if($variant->delete()){
            $request->session()->flash('green', 'Variant successful deleted!');
            return redirect("/manage/products/".$product->id);
        }else {
            $request->session()->flash('red', 'Something went wrong, Please try again!');
            return back();
        }
    }

    public function changeStatus($pkgid)
    {

        $variant = Variant::findOrFail($pkgid);

        if($variant->status === 0) {
            $status = 1;
        }else{
            $status = 0;
        }

        $variant->status = $status;
        $done = $variant->save();
        if($done) {
            return response()->json(['Status successfully updated!']);
        }
    }

    public function addColorToVariant (Request $request, Product $product, Variant $variant) {
        if(!$request->detach) {
            $variant->colors()->sync($request->color);
            return response()->json(['Color added successfully added!']);
        }else{
            $variant->colors()->detach();
            return response()->json(['Color removed successfully!']);
        }

    }


}
