<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;
use Spatie\Image\Image as SpatieImage;
use Spatie\Image\Manipulations;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get()->all();
        return view('manage.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();
        return view('manage.category.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        if ($request->has('image')) {
            $pathToFile = $this->createImage($request->image);
        }

        if ($request->has('thumb')) {
            $pathToFile = $this->createImage($request->image);
        }



        if($request->featured === 'on') {
            $featured = 1;
        }else{
            $featured = 0;
        }

        // return auth()->id();

        $category = Category::create([
            'title' => $request->title,
            'featured' => $featured,
            'menu_id' => $request->menu_id,
            'user_id' => auth()->id(),
        ]);

        if($request->has('image')) {
            $category->addMedia($pathToFile)
            ->toMediaCollection('images');
        }

        if($request->has('thumb')) {
            $category->addMedia($pathToFile)
            ->toMediaCollection('thumbnail');
        }

        if ($category) {
            $request->session()->flash('green', 'Category was successful added!');
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


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        // $media = $category->getMedia();
        $menus = Menu::all();
        $image = $category->getFirstMediaUrl('images', 'thumb');
        $thumbnail = $category->getFirstMediaUrl('thumbnail', 'thumb');
        return view('manage.category.show', compact('category','image', 'thumbnail', 'menus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        $request->validate([
            'title' => 'required',
        ]);

        if($request->has('image')) {
            $mediaItems = $category->getMedia('images');
            if(count($mediaItems) != 0) {
                $mediaItems[0]->delete();
            }
            $pathToFile = $this->createImage($request->image);
            $category->addMedia($pathToFile)->toMediaCollection('images');
        }

        if($request->has('thumb')) {
            $mediaItems = $category->getMedia('thumbnail');
            if(count($mediaItems) != 0) {
                $mediaItems[0]->delete();
            }
            $pathToFile = $this->createImage($request->thumb);
            $category->addMedia($pathToFile)->toMediaCollection('thumbnail');
        }

        if($request->featured === 'on') {
            $featured = 1;
        }else{
            $featured = 0;
        }

        $category->title = $request->title;
        $category->menu_id = $request->menu_id;
        $category->featured = $featured;

        $done = $category->save();

        if ($done) {
            $request->session()->flash('green', 'Category was successful updated!');
            return back();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Category $category)
    {
        if($category->delete()){
            $request->session()->flash('green', 'Category successful deleted!');
            return redirect('/manage/categories');
        }else {
            $request->session()->flash('red', 'Something went wrong, Please try again!');
            return back();
        }
    }

    public function changeStatus(Category $category)
    {
        if($category->status === 0) {
            $status = 1;
        }else{
            $status = 0;
        }

        $category->status = $status;
        $done = $category->save();
        if($done) {
        return response()->json(['Status successfully updated!']);
        }
    }

    public function assignLabel(Request $request, Category $category)
    {
        $category->label_id = $request->label;
        $done = $category->save();
        if($done) {
        return response()->json(['Category successfully updated!']);
        }
    }
}
