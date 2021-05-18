<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Finishing;
use Illuminate\Http\Request;
use Image;
use File;
use Illuminate\Support\Str;
use Spatie\Image\Image as SpatieImage;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manage.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $finishings = Finishing::all();
        return view('manage.product.create', compact('categories', 'finishings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createGiftProduct()
    {
        $categories = Category::where('menu_id', 13)->get();
        $finishings = Finishing::all();
        return view('manage.product.gift.create', compact('categories', 'finishings'));
    }

    public function createShirtProduct()
    {
        $categories = Category::where('menu_id', 14)->get();
        $colors = Color::all();
        return view('manage.product.shirt.create', compact('categories', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->type === 'general') {
            $request->validate([
                'title' => 'required',
                'points_title' => 'required',
                'min_quantity' => 'required',
                'max_quantity' => 'required',
                'delivery_time' => 'required',
            ]);
        }elseif($request->type === 'gift') {
            $request->validate([
                'title' => 'required',
                'delivery_time' => 'required',
            ]);
        }


        if($request->min_quantity > $request->max_quantity) {
            $request->session()->flash('red', 'Min quanitity mush be less then max quantity.');
            return redirect()->route('products.create');
        }

        if($request->has('image')) {
            $pathToFile = $this->createImage($request->image);
        }

        if($request->has('cover')) {
            $pathToFile = $this->createImage($request->cover);
        }

        $quantity = $request->min_quantity . ',' . $request->max_quantity;

        // $request->color;

        $product = Product::create([
            'title' => $request->title,
            'title_two' => $request->title_two,
            'body_title' => $request->points_title,
            'body_subtitle' => $request->body_subtitle,
            'printing_text' => $request->printing_text,
            'printing' => $request->printing,
            'quantity' => $quantity,

            'brand' => $request->brand,
            'color_id' => $request->color,
            'gender' => $request->gender,
            'type' => $request->type,
            'cloth_type' => $request->cloth_type,
            'neck' => $request->neck,
            'material' => $request->material,
            'unique_code' => $request->unique_code,

            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'delivery_time' => $request->delivery_time,
            'user_id' => auth()->id(),
        ]);

        $product->finishings()->sync($request->finishings);

        if($request->has('image')) {
            $product->addMedia($pathToFile)
                    ->toMediaCollection('images');
        }
        if($request->has('cover')) {
            $product->addMedia($pathToFile)
                    ->toMediaCollection('covers');
        }
        if ($product) {
            $request->session()->flash('green', 'Product was successful added!');
            return redirect()->route('products.show', $product->id);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

        $notSelectedFinishings = Finishing::with('products')->whereDoesntHave('products')->get();

        $categories = Category::where('menu_id', $product->category->menu->id)->get();
        $finishings = Finishing::all();
        $notFinish = Finishing::whereDoesntHave('products', function($query) use ($product) {
            $query->where('id', $product->id);
          })->get();
        $points = $product->points;
        $image = $product->getMedia('images')->count() != 0 ? $product->getMedia('images')[0]->getUrl() : null;
        $cover = $product->getMedia('covers')->count() != 0 ? $product->getMedia('covers')[0]->getUrl() : null;
        $quantity = explode(',', $product->quantity);
        $min_quantity = $quantity[0];
        $max_quantity = $quantity[1];

        if ($product->category->menu->id == 13) {
            return view('manage.product.gift.show', compact(
                'product',
                'min_quantity',
                'notSelectedFinishings',
                'finishings',
                'notFinish',
                'max_quantity',
                'image',
                'points',
                'categories'
        ));
        }elseif($product->category->menu->id == 14){
            $colors = Color::all();
            return view('manage.product.shirt.show', compact(
                'colors',
                'product',
                'image',
                'categories'
            ));
        }else{
            {
            return view('manage.product.show', compact(
                'product',
                'min_quantity',
                'notSelectedFinishings',
                'finishings',
                'notFinish',
                'max_quantity',
                'image',
                'cover',
                'points',
                'categories'));
            }
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product){
        $request->validate([
            'title' => 'required',
            // 'points_title' => 'required',
            // 'min_quantity' => 'required',
            // 'max_quantity' => 'required',
            'delivery_time' => 'required',
            'category_id' => 'required',
        ]);

        if($request->min_quantity > $request->max_quantity) {
            $request->session()->flash('red', 'Min quanitity mush be less then max quantity.');
            return redirect()->route('products.show', $product->id);
        }

        if($request->has('image')) {

            $mediaItems = $product->getMedia('images');
            if(count($mediaItems) != 0) {
                $mediaItems[0]->delete();
            }
            $pathToFile = $this->createImage($request->image);
            $product->addMedia($pathToFile)
                    ->toMediaCollection('images');
        }

        if($request->has('cover')) {

            $mediaItems = $product->getMedia('covers');
            if(count($mediaItems) != 0) {
                $mediaItems[0]->delete();
            }

            $pathToFile = $this->createImage($request->cover);
            $product->addMedia($pathToFile)
                    ->toMediaCollection('covers');
        }


        $quantity = $request->min_quantity . ',' . $request->max_quantity;

            $product->title = $request->title;
            $product->title_two = $request->title_two;
            $product->body_title = $request->points_title;
            $product->body_subtitle = $request->body_subtitle;
            $product->quantity = $quantity;

            $product->brand = $request->brand;
            $product->color_id = $request->color;
            $product->gender = $request->gender;
            $product->type = $request->type;
            $product->cloth_type = $request->cloth_type;
            $product->neck = $request->neck;
            $product->unique_code = $request->unique_code;
            $product->material = $request->material;

            $product->printing_text = $request->printing_text;
            $product->printing = $request->printing;
            $product->category_id = $request->category_id;
            $product->sub_category_id = $request->sub_category_id;
            $product->delivery_time = $request->delivery_time;

            $product->finishings()->sync($request->finishings);

        if ($product->save()) {
            $request->session()->flash('green', 'Product successful updated!');
            return redirect()->route('products.show', $product->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product){

        foreach ($product->points as $point) {
            $point->delete();
        }
        if($product->delete()){
            $request->session()->flash('green', 'Product successful deleted!');
            return redirect("/manage/products/");
        }else {
            $request->session()->flash('red', 'Something went wrong, Please try again!');
            return back();
        }
    }


    public function storeGallery(Request $request, Product $product){
        $pathToFile = $this->createImage($request->file);
        $save = $product->addMedia($pathToFile)->toMediaCollection('product-gallery');
        if($save) {
            return response()->json(['Image successfully uploaded!']);
        }
    }

    public function createImage($file) {
        $file =  $file;
        $monthYear = date('FY');
        $imgName = Str::random();

        $folder_by_month = public_path().'/storage/';
        !file_exists($folder_by_month) && mkdir($folder_by_month , 0777, true);
        $fileName = $imgName . '.' . $file->getClientOriginalExtension();
        $pathToFile = public_path().'/storage/' . $fileName;
        Image::make($file)->save($pathToFile);

        // SpatieImage::load($pathToFile)
        // ->format(Manipulations::FORMAT_WEBP)
        // ->save();

        return $pathToFile;
    }

    public function changeStatus(Product $product)
    {
        if($product->status === 0) {
            $status = 1;
        }else{
            $status = 0;
        }

        $product->status = $status;
        $done = $product->save();
        if($done) {
        return response()->json(['Status successfully updated!']);
        }
    }

    public function deleteGalleryImage (Product $product, $mid) {
        $mediaTodelete = Media::where('id', $mid);

        File::deleteDirectory(public_path('storage/'.$mid));

        $done = $mediaTodelete->delete();
        if($done) {
            return response()->json(['Image successfully deleted!']);
        }
    }


    public function selectProductType() {
        return view('manage.product.select_product_type');
    }

    public function assignLabel(Request $request, Product $product)
    {
        $product->label_id = $request->label;
        $done = $product->save();
        if($done) {
        return response()->json(['Label added successfully!']);
        }
    }


}
