<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Paper;
use App\Models\Product;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $packages = Package::where('product_id', $product->id)->get();
        return view('manage.product.package.index', compact('product', 'packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        $papers = Paper::where('status', '1')->get();
        return view('manage.product.package.create', compact('product', 'papers'));
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
            'paper' => 'required',
        ]);

        $package = Package::create([
            'paper_id' => $request->paper,
            'product_id' => $product->id,
            'user_id' => auth()->id(),
        ]);


        if ($package) {
            $request->session()->flash('green', 'Package was successful added!');
            return redirect("/manage/products/".$product->id."/packages/".$package->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, Package $package)
    {
        $papers = Paper::where('status', '1')->get();

        return view('manage.product.package.show', compact('product','package', 'papers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product,  Package $package)
    {
        $package->paper_id = $request->paper;
        if ($package->save()) {
            $request->session()->flash('green', 'Package was successful updated!');
            return redirect("/manage/products/".$product->id."/packages/".$package->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product, Package $package)
    {
        if($package->delete()){
            $request->session()->flash('green', 'Package successful deleted!');
            return redirect("/manage/products/".$product->id);
        }else {
            $request->session()->flash('red', 'Something went wrong, Please try again!');
            return back();
        }
    }

    public function changeStatus($pkgid)
    {

        $package = Package::findOrFail($pkgid);

        if($package->status === 0) {
            $status = 1;
        }else{
            $status = 0;
        }

        $package->status = $status;
        $done = $package->save();
        if($done) {
            return response()->json(['Status successfully updated!']);
        }
    }
}
