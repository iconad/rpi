<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class pagesController extends Controller
{
    public function home()
    {
        return view('home');
    }
    public function order()
    {
        return view('order');
    }
    public function TermsAndConditions()
    {
        return view('terms-and-conditions');
    }
    public function uploadSelection()
    {
        return view('upload-selection');
    }
    public function cart()
    {
        return view('cart');
    }
    public function page()
    {
        return view('product.single');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function showProduct($slug)
    {
        $printProducts = array(10,12);

        $menu = Product::where('slug', $slug)->first()->category->menu->id;

        if (in_array($menu, $printProducts)) {
            return $this->printProducts($slug);
        }
    }

    function printProducts ($slug) {

        $product = Product::where('slug', $slug)->first();

        return view('product.single', compact('product'));
    }


    public function uploadPost(Request $request)
    {
        $file =  $request->file;
        $monthYear = date('FY');
        $imgName = Str::random();

        $folder_by_month = public_path().'/storage/product/'.$monthYear;
        !file_exists($folder_by_month) && mkdir($folder_by_month , 0777, true);

        $filePathForDB = 'product/'.$monthYear. '/' . $imgName . '.' . $file->getClientOriginalExtension();

        $fileName = $imgName . '.' . $file->getClientOriginalExtension();

        $location = public_path().'/storage/product/'. $monthYear. '/' . $fileName;

        $done = Image::make($file)->save($location);

        if ($done) {
            return $filePathForDB . " done";
        }

    }
}
