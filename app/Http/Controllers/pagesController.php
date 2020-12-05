<?php

namespace App\Http\Controllers;

use App\Http\Resources\frontend\GiftProductsBySubCategory;
use App\Models\Category;
use App\Models\Product;
use App\Models\Color;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    // personalized gifts by category
    public function personalizedGiftsByCategory (Request $request, $slug) {
        $subcategory = SubCategory::where('slug', $slug)->first();
        $colors = Color::all();

        if($request->has('colors')){
            $selectedColors = $request['colors'];
        }else{
            $selectedColors = $colors->pluck('id');
        }

        // return $selectedColors;

        $subcategory = SubCategory::where('slug', $slug)->first();

        $term = $request->search;

        $sorted = collect(
            Product::where('sub_category_id', $subcategory->id)
            ->with('variants')
            ->whereHas('variants.color', function($q2) use ($selectedColors, $request) {
                $q2->whereIn('color_id', $selectedColors);
            })
            ->when($request->get('search'), function ($query, $term) {
                $query->where('title', 'LIKE', "%{$term}%");
            })
            ->where('status', 1)
            ->get()
        );

        if($request->sort === 'low-to-high'){
            $products = $sorted->sortBy(function($product) {
                return $product->minPrice();
            })
            ->values();
        }elseif($request->sort === 'low-to-high'){
            $products = $sorted->sortByDesc(function($product) {
                return $product->maxPrice();
            })
            ->values();
        }else{
            $products = $sorted->sortByDesc('created_at')
            ->values();
        }


        $selectedColors = (array) $selectedColors;


        // return $products;

        return view('product.gift.index', compact('subcategory', "products", "colors", "slug", "selectedColors"));



        $subcategory = SubCategory::whereHas('products')->with([
            'products' => function($q1) use ($selectedColors, $request) {
                $q1->where('status', 1);

                // $q1->join('variants', 'variants.product_id', '=', 'products.id')->orderBy('variants.price');

                $q1->whereHas('variants.color', function($q2) use ($selectedColors, $request) {
                    $q2->whereIn('color_id', $selectedColors);
                });

                // $q1->select('price from variants', function($q3) use ($selectedColors, $request) {
                //     $q3->orderBy('id', 'desc' );
                // });

                // dump($q1->toSql());

            },
            'products.variants' => function($q2) use ($selectedColors)  {
                $q2->where('status', 1);
            }
        ])
        ->where('slug', $slug)
        ->first();

        $selectedColors = (array) $selectedColors;

        // return $subcategory;

        // return view('product.gift.index', compact('subcategory', "colors", "slug", "selectedColors"));

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
