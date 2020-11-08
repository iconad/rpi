<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\Product;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;
use Spatie\Image\Image as SpatieImage;
use Spatie\Image\Manipulations;

class PointController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $points = Point::where('product_id', $product->id)->get();
        return view('manage.product.point.index', compact('product', 'points'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('manage.product.point.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required',
            'detail' => 'required',
        ]);

        if($request->has('icon')){
            $pathToFile = $this->createImage($request->icon);
        }


        $save = Point::create([
            'title' => $request->title,
            'body' => $request->detail,
            'product_id' => $product->id,
            'image' => $request->icon,
            'user_id' => auth()->id(),
        ]);

        if($request->has('icon')){
            $save->addMedia($pathToFile)
            ->withResponsiveImages()
            ->toMediaCollection('images');
        }

        if ($save) {
            $request->session()->flash('green', 'Point was successful added!');
            return redirect()->route('points.create', $product->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, Point $point)
    {
        // $media = $point->getFirstMedia('images');
        // return $media;
        return view('manage.product.point.show', compact('product', 'point'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, Point $point)
    {
        // return view('manage.product.point.create', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, Point $point)
    {
        $request->validate([
            'title' => 'required',
            'detail' => 'required',
        ]);

        if($request->has('icon')) {
            $mediaItems = $point->getMedia('images');
            if(count($mediaItems) != 0) {
                $mediaItems[0]->delete();
            }
            $pathToFile = $this->createImage($request->icon);
            $point->addMedia($pathToFile)->withResponsiveImages()->toMediaCollection('images');

        }

        $point->title = $request->title;
        $point->product_id = $product->id;
        $point->body = $request->detail;

        $save = $point->save();

        if ($save) {
            $request->session()->flash('green', 'Point was successful updated!');
            return back();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product, Point $point)
    {
        if($point->delete()){
            $request->session()->flash('green', 'Point successful deleted!');
            return redirect("/manage/products/" .$product->id);
        }else {
            $request->session()->flash('red', 'Something went wrong, Please try again!');
            return back();
        }
    }

    public function createImage($file) {
        $file =  $file;
        $monthYear = date('FY');
        $imgName = Str::random();

        $folder_by_month = public_path().'/storage/images/';
        !file_exists($folder_by_month) && mkdir($folder_by_month , 0777, true);
        $fileName = $imgName . '.' . $file->getClientOriginalExtension();
        $pathToFile = public_path().'/storage/images/' . $fileName;
        Image::make($file)->save($pathToFile);

        // SpatieImage::load($pathToFile)
        // ->format(Manipulations::FORMAT_WEBP)
        // ->save();

        return $pathToFile;
    }
}
