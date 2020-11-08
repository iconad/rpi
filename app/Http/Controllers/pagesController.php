<?php

namespace App\Http\Controllers;

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
