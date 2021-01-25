<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\Menu;
use Image;
use Illuminate\Support\Str;
use Spatie\Image\Image as SpatieImage;
use Spatie\Image\Manipulations;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $subcategories = $category->subCategoriesAll;
        return view('manage.category.sub.index', compact('category', 'subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        return view('manage.category.sub.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category)
    {
        $request->validate([
            'title' => 'required',
        ]);

        if ($request->has('image')) {
            $pathToFile = $this->createImage($request->image);
        }



        if($request->featured === 'on') {
            $featured = 1;
        }else{
            $featured = 0;
        }

        $subcategory = SubCategory::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'featured' => $featured,
            'menu_id' => $category->menu->id,
            'category_id' => $category->id,
            'user_id' => auth()->id(),
        ]);

        if($request->has('image')) {
            $subcategory->addMedia($pathToFile)
            ->toMediaCollection('images');
        }

        if ($subcategory) {
            $request->session()->flash('green', 'Sub category has been successful created!');
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
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, SubCategory $subCategory)
    {
        $image = $subCategory->getFirstMediaUrl('images', 'thumb');
        return view('manage.category.sub..show', compact('subCategory', 'category','image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, SubCategory $subCategory)
    {
        $request->validate([
            'title' => 'required',
        ]);

        if($request->has('image')) {
            $mediaItems = $subCategory->getMedia('images');
            if(count($mediaItems) != 0) {
                $mediaItems[0]->delete();
            }
            $pathToFile = $this->createImage($request->image);
            $subCategory->addMedia($pathToFile)->toMediaCollection('images');
        }

        if($request->featured === 'on') {
            $featured = 1;
        }else{
            $featured = 0;
        }

        $subCategory->title = $request->title;
        $subCategory->subtitle = $request->subtitle;
        $subCategory->body = $request->body;
        $subCategory->category_id = $category->id;
        $subCategory->menu_id = $category->menu->id;
        $subCategory->featured = $featured;

        $done = $subCategory->save();

        if ($done) {
            $request->session()->flash('green', 'Sub Category was successful updated!');
            return back();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Category $category, SubCategory $subCategory)
    {
        if($subCategory->delete()){
            $request->session()->flash('green', 'Sub category successful deleted!');
            return redirect('/manage/categories');
        }else {
            $request->session()->flash('red', 'Something went wrong, Please try again!');
            return back();
        }
    }

    public function changeStatus($scid)
    {
        $subCategory = SubCategory::where('id', $scid)->first();
        if($subCategory->status === 0) {
            $status = 1;
        }else{
            $status = 0;
        }

        $subCategory->status = $status;
        $done = $subCategory->save();
        if($done) {
        return response()->json(['Status successfully updated!']);
        }
    }

    public function assignLabel(Request $request, $scid)
    {
        $subCategory = SubCategory::where('id', $scid)->first();
        $subCategory->label_id = $request->label;
        $done = $subCategory->save();
        if($done) {
        return response()->json(['Sub category successfully updated!']);
        }
    }
}
