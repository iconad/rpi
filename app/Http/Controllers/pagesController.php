<?php

namespace App\Http\Controllers;

use App\Http\Resources\frontend\GiftProductsBySubCategory;
use App\Mail\EstimateEmailToAdmin;
use App\Mail\EstimateemailtouserMail;
use App\Models\Category;
use App\Models\Product;
use App\Models\Color;
use App\Models\Estimate;
use App\Models\Menu;
use App\Models\Package;
use App\Models\PackagePrice;
use App\Models\Page;
use App\Models\SubCategory;
use App\Models\Template;
use App\Models\TemplateCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Image;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class pagesController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function checkOrderType (Request $request, $type, $slug) {

        $types = ['shirt', 'paper', 'gift'];

        if (!in_array($type, $types)) {
            return redirect('/');
        }else{
            if ($type == 'paper') {
                $product = Product::where('slug', $slug)->first();
                if (!$product) {
                    return redirect('/');
                }else{
                    return $this->productOrder($request, $slug);
                }
            }elseif($type == 'shirt') {

                $checkedSlug = preg_replace('/-[^-]*$/', '', $slug);
                $pid = substr($slug, strrpos($slug, '-') + 1);

                $category = Category::where('slug', $checkedSlug)->first();
                if (!$category) {
                    return redirect('/');
                }else{
                    return $this->shirtProductOrder($request, $checkedSlug, $pid);
                }
            }elseif($type == 'gift') {
                $product = Product::where('slug', $slug)->first();
                if (!$product) {
                    return redirect('/');
                }else{
                    return $this->giftProductOrder($request, $slug, $product);
                }
            }
        }

    }

    public function productOrder(Request $request, $slug)
    {

        $product = Product::where('slug', $slug)->first();

        // return $packageprice = PackagePrice::where('id', $request->package)->first();

        if($request->has('package')) {
            $package = Package::where('id', $request->package)
            ->with('paper')
            ->with('prices')
            ->with('prices.sizes')
            ->with('prices.sizes.size')
            ->first();
        }else{
            $package = $product->packages[0]
            ->with('prices')
            ->with('prices.sizes')
            ->with('prices.sizes.size')
            ->first();
        }

        // return $package;

        $currentPaper = $package;
        $packages = $package->prices;
        // return $sizes = $package->with('prices')
        // ->with('prices.size')
        // ->get();

        // return $package->prices;


        if ($request->has('category')) {
            $menu = Menu::where('id', $request->category)->first();
        }else{
            return redirect('/');
        }

        if ($request->has('type')) {
            $orderType = $request->type;
        }else{
            $orderType = "paper";
        }

        return view('order-filter', compact('orderType', 'currentPaper', 'menu', 'product', 'package', "packages"));
    }

    public function shirtProductOrder(Request $request, $slug, $pid)
    {

        $category = Category::where('slug', $slug)->first();
        $products = $category->products;

        // $product = count($products) != 0 ? $products[1] : null ;

        $images = Media::where('model_id', $pid)->where('collection_name', 'product-gallery')->get();

        // return $product;

        if($request->has('subcategory')) {
            // $product = Product::where('sub_category_id', $request->subcategory)->first();
            // $sub1 = SubCategory::where('id', $request->subcategory)->first();
            // return $product->id;
            $subCategory = SubCategory::whereHas('category', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })
            ->where('id', $request->subcategory)
            ->first();

        }else{
            $subCategory = Product::where('category_id', $category->id)->first()->subcategory;
        }

        if(!$subCategory) {
            return redirect('/');
        }

        if ($request->has('type')) {
            $orderType = $request->type;
        }else{
            $orderType = "shirt";
        }

        return view('order-filter-shirt', compact('orderType', 'products', 'images', 'subCategory'));
    }

    public function giftProductOrder(Request $request, $slug, $product)
    {

        $variants = $product->variants;
        $menu = $product->category->menu;
        $category = $product->category;


        if ($request->has('type')) {
            $orderType = $request->type;
        }else{
            $orderType = "gift";
        }

        return view('order-filter-gift', compact('orderType', 'product', "variants", 'category', "menu"));
    }



    public function TermsAndConditions()
    {
        return view('terms-and-conditions');
    }
    public function cart()
    {
        return view('cart');
    }
    public function artnetwork()
    {
        return view('pages.artworking-service');
    }
    public function onetoone()
    {
        return view('onetoone.page');
    }
    public function prodesign()
    {
        return view('pages.pro-design-service');
    }
    public function page()
    {
        return view('product.single');
    }

    public function singlePage($slug)
    {
        $page = Page::where('slug', $slug)->first();
        return view('pages.page', compact('page'));
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

    public function showProductsByCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $subcategories = SubCategory::where('category_id', $category->id)
        ->whereHas('products')
        ->get();
        if($category->menu->id == 11) {
            return view('product.packing.index', compact('category', 'subcategories'));
        }else{
            return view('product.index', compact('category', 'subcategories'));
        }
    }

    public function showPackingByCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $subcategories = SubCategory::where('category_id', $category->id)
        ->whereHas('products')
        ->get();
        return view('product.index', compact('category', 'subcategories'));
    }

    public function showProductsBySubCategory($category, $sub)
    {
        $subcategory = SubCategory::where('slug', $sub)->first();
        return view('product.productsbysubcategory', compact('subcategory'));
    }

    function printProducts ($slug) {

        $product = Product::where('slug', $slug)->first();
        $cover = $product->getMedia('covers')->count() != 0 ? $product->getMedia('covers')[0]->getUrl() : null;

        if(!$cover) {
            $cover = "https://jadukori.com/uploads/cover/small/no-image.png";
        }

        return view('product.single', compact('product','cover'));
    }

    function shirtProduct ($slug) {

        return $product = Product::where('slug', $slug)->first();

        $cover = $product->getMedia('covers')->count() != 0 ? $product->getMedia('covers')[0]->getUrl() : null;

        if(!$cover) {
            $cover = "https://jadukori.com/uploads/cover/small/no-image.png";
        }

        return view('product.single', compact('product','cover'));
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

        return view('product.gift.index', compact('subcategory', "products", "colors", "slug", "selectedColors"));


    }


    public function shirtsByCategory (Request $request, $slug) {
        $category = Category::where('slug', $slug)->first();
        $colors = Color::all();

        $term = $request->search;
        $selectedGenders = $request->genders;
        $selectedNecks = $request->necks;
        $selectedMaterials = $request->materials;
        $selectedTypes = $request->types;

        if($request->has('colors')){
            $selectedColors = $request['colors'];
        }else{
            $selectedColors = $colors->pluck('id');
        }

        $sorted = collect(
            Product::where('category_id', $category->id)
            ->with('variants')
            ->with('color')

            ->when($request->get('search'), function ($query, $term) {
                $query->where('title', 'LIKE', "%{$term}%");
            })

            ->when($request->get('genders'), function ($query, $selectedGenders) {
                $query->whereIn('gender', $selectedGenders);
            })

            ->when($request->get('necks'), function ($query, $selectedNecks) {
                $query->whereIn('neck', $selectedNecks);
            })

            ->when($request->get('materials'), function ($query, $selectedMaterials) {
                $query->whereIn('material', $selectedMaterials);
            })

            ->when($request->get('types'), function ($query, $selectedTypes) {
                $query->whereIn('cloth_type', $selectedTypes);
            })

            ->whereHas('color', function($q2) use ($selectedColors, $request) {
                $q2->whereIn('id', $selectedColors);
            })

            ->whereHas('variants')

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
        $selectedGenders = (array) $selectedGenders;
        $selectedNecks = (array) $selectedNecks;
        $selectedMaterials = (array) $selectedMaterials;
        $selectedTypes = (array) $selectedTypes;



        return view('product.shirt.index',
        compact(
            "category",
            "products",
            "colors",
            "slug",
            "selectedColors",
            "selectedGenders",
            "selectedNecks",
            "selectedMaterials",
            "selectedTypes"
        ));

    }

    public function shirtsBySubCategory (Request $request, $cslug, $subslug) {
        $subCategory = SubCategory::where('slug', $subslug)->first();
        $category = Category::where('slug', $cslug)->first();
        $colors = Color::all();

        $term = $request->search;
        $selectedGenders = $request->genders;
        $selectedNecks = $request->necks;
        $selectedMaterials = $request->materials;
        $selectedTypes = $request->types;

        if($request->has('colors')){
            $selectedColors = $request['colors'];
        }else{
            $selectedColors = $colors->pluck('id');
        }

        $sorted = collect(
            Product::where('sub_category_id', $subCategory->id)
            ->where('category_id', $category->id)
            ->with('variants')
            ->with('color')

            ->when($request->get('search'), function ($query, $term) {
                $query->where('title', 'LIKE', "%{$term}%");
            })

            ->when($request->get('genders'), function ($query, $selectedGenders) {
                $query->whereIn('gender', $selectedGenders);
            })

            ->when($request->get('necks'), function ($query, $selectedNecks) {
                $query->whereIn('neck', $selectedNecks);
            })

            ->when($request->get('materials'), function ($query, $selectedMaterials) {
                $query->whereIn('material', $selectedMaterials);
            })

            ->when($request->get('types'), function ($query, $selectedTypes) {
                $query->whereIn('cloth_type', $selectedTypes);
            })

            ->whereHas('color', function($q2) use ($selectedColors, $request) {
                $q2->whereIn('id', $selectedColors);
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
        $selectedGenders = (array) $selectedGenders;
        $selectedNecks = (array) $selectedNecks;
        $selectedMaterials = (array) $selectedMaterials;
        $selectedTypes = (array) $selectedTypes;


        // return $products;

        return view('product.shirt.sub.index',
        compact(
            "subCategory",
            "products",
            "colors",
            "subslug",
            "selectedColors",
            "selectedGenders",
            "selectedNecks",
            "selectedMaterials",
            "selectedTypes"
        ));

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

    public function estimate() {
        return view('pages.estimate');
    }

    public function estimateStore(Request $request) {

        $this->validate(request(), [
            'company' => 'required',
            'first' => 'required',
            'last' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'product' => 'required',
            'quantity' => 'required',
            'size' => 'required',
            'detail' => 'required'
        ]);

        $estimate = Estimate::create([
            'company' => $request->company,
            'first_name' => $request->first,
            'last_name' => $request->last,
            'email' => $request->email,
            'phone' => $request->phone,
            'product' => $request->product,
            'quantity' => $request->quantity,
            'size' => $request->size,
            'detail' => $request->detail,
        ]);

        if($estimate) {

            $subject = "Your estimate successfully has beed received!";


            $message = $subject. " " . " One of team member will contact you ASAP. " . "if you have any question please contact us on +971 6 534 1113";

            $data = array(
                'name' => $request->name,
                'subject' => $subject,
                'message' => $message
            );
            $adminData = array(
                'subject' => $subject,
                'company' => $request->company,
                'name' => $request->name,
                'first_name' => $request->first,
                'last_name' => $request->last,
                'email' => $request->email,
                'phone' => $request->phone,
                'product' => $request->product,
                'quantity' => $request->quantity,
                'size' => $request->size,
                'detail' => $request->detail,
            );

            Mail::to($request->email)->send(new EstimateemailtouserMail($data));
            Mail::to('hammad@rpi.ae')->send(new EstimateEmailToAdmin($adminData));


            return response()->json(
                [
                    'status' => true,
                    'message' => 'Successfully submited!',
                ]
            );
        }

    }

    public function templateCategories() {
        $categories = TemplateCategory::where('status', 1)->get();
        return view('template.category.index', compact('categories'));
    }

    public function templateByCategory($slug) {
        $category = TemplateCategory::where('slug', $slug)->first();
        $categories = TemplateCategory::where('status', 1)->get();
        $templates = Template::where('template_category_id', $category->id)->get();
        return view('template.index', compact('categories', 'category', 'templates'));
    }

    public function getCategoriesByMenu ($slug) {

        // if(!Menu::where('slug', $slug)->exists()) {
        //     return redirect('/');
        // }

        $menu = Menu::where('slug', $slug)->firstOrFail();

        $categories = Category::with('subcategories')
                ->where('menu_id', $menu->id)
                ->whereHas('products')->get();
        return view('category.single', compact('menu', 'categories'));



    }



    // function testPage () {
    //     return view('test');
    // }


}
