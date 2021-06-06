<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Product;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;
use Spatie\Image\Image as SpatieImage;
use Spatie\Image\Manipulations;
class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Carousel::get();
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

        if($request->coverRadio == 'product') {
            $this->validate(request(), [
                'title' => 'required',
                'product' => 'required',
            ]);

            $pid = json_decode($request->product)->id;

        }else{
            $this->validate(request(), [
                'title' => 'required',
                'image' => 'required',
            ]);

            if ($request->has('image')) {
                $pathToFile = $this->createImage($request->image);
            }

            $pid = null;
        }


        $carousel = Carousel::create([
            'title' => $request->title,
            'link' => $request->link,
            'type' => "home-page",
            'product_id' => $pid,
        ]);

        if($request->has('image')) {
            $carousel->addMedia($pathToFile)
            ->toMediaCollection('images');
        }

        if ($carousel) {
            $request->session()->flash('green', 'Category was successful added!');
            return back();
        }

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
        return "update";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $carousel = Carousel::where('id', $id)->first();

        if($carousel->delete()){
            $request->session()->flash('green', 'slider successful deleted!');
            return redirect("/manage/sliders/");
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

    public function changeStatus($id)
    {
        $carousel = Carousel::where('id', $id)->first();

        if($carousel->status === 0) {
            $status = 1;
        }else{
            $status = 0;
        }

        $carousel->status = $status;
        $done = $carousel->save();
        if($done) {
        return response()->json(['Status successfully updated!']);
        }
    }
}
