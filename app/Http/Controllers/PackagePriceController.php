<?php

namespace App\Http\Controllers;

use App\Models\PackagePrice;
use App\Models\PackagePriceSize;
use App\Models\Product;
use App\Models\Package;
use App\Models\Size;
use Illuminate\Http\Request;

class PackagePriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product, Package $package)
    {
        return redirect("manage/products/".$product->id."/packages/".$package->id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product, Package $package)
    {
        return redirect("manage/products/".$product->id."/packages/".$package->id);
        // $sizes = Size::where('status', '1')->get();
        // return view("manage.product.package.price.create", compact('product', 'package'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product, Package $package)
    {
        $this->validate(request(), [
            'price' => 'required',
            'size' => 'required',
            'quantity' => 'required',
        ]);


        $checkQuantity = PackagePrice::whereHas('size', function ($query) use ($request, $package) {
            $query->where('id', '=', $request->size);
            $query->where('package_id', '=', $package->id);
        })
        ->where('quantity', $request->quantity)->get()->count();

        if ($checkQuantity != 0) {

            return response()->json(
                [
                    'status' => false,
                    'message' => "package for price $request->price with this size already existed!"
                ]
            );

        }else{

            $packageprice = PackagePrice::create([
                'quantity' => $request->quantity,
                'package_id' => $package->id,
                'size_id' => $request->size
            ]);

            $packagepricesize = PackagePriceSize::create([
                'package_price_id' => $packageprice->id,
                'size_id' => $request->size,
                'price' => $request->price,
            ]);

            if($packagepricesize) {
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Price successfully added!'
                    ]
                );
            }

        }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PackagePrice  $packagePrice
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, Package $package, PackagePrice $packagePrice)
    {
        return redirect("manage/products/".$product->id."/packages/".$package->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PackagePrice  $packagePrice
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, Package $package, PackagePrice $packagePrice)
    {
        return redirect("manage/products/".$product->id."/packages/".$package->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PackagePrice  $packagePrice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, Package $package, $packagePrice)
    {
        $this->validate(request(), [
            'quantity' => 'required',
        ]);

        $price = PackagePrice::where('id', $packagePrice)->first();

        $price->quantity = $request->quantity;
        $price = $price->save();

        if($price AND $request->addsize) {

            $this->validate(request(), [
                'price' => 'required',
                'packageprice' => 'required',
                'size' => 'required',
            ]);

            $packagepricesize = PackagePriceSize::create([
                'package_price_id' => $request->packageprice,
                'size_id' => $request->size,
                'price' => $request->price,
            ]);
        }

        return response()->json(['message' => 'Package successfully updated!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PackagePrice  $packagePrice
     * @return \Illuminate\Http\Response
     */
    public function destroy( Product $product, Package $package, $packagePrice)
    {
        $price = PackagePrice::where('id', $packagePrice)->first();
        if($price->delete()){
            return response()->json(['Price successfully deleted!']);
        }else {
            return response()->json(['something worng, please try again']);
        }
    }
}
