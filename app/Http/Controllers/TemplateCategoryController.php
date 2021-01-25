<?php

namespace App\Http\Controllers;

use App\Models\TemplateCategory;
use Illuminate\Http\Request;
use Image;
use File;
use Illuminate\Support\Str;
use Spatie\Image\Image as SpatieImage;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class TemplateCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manage.template.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate(request(), [
            'title' => 'required',
            'image' => 'required',
        ]);


        if($request->image != null) {
            $pathToFile = $this->createImage($request->image);
        }


        $finishoption = TemplateCategory::create([
            'title' => $request->title,
            'excerpt' => $request->price,
        ]);

        if($request->image != null) {
            $finishoption->addMedia($pathToFile)
                    ->toMediaCollection('images');
        }

        if($finishoption) {
            return response()->json(['message' => 'Category successfully added!']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TemplateCategory  $templateCategory
     * @return \Illuminate\Http\Response
     */
    public function show(TemplateCategory $templateCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TemplateCategory  $templateCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(TemplateCategory $templateCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TemplateCategory  $templateCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TemplateCategory $templateCategory)
    {

        $this->validate(request(), [
            'title' => 'required',
        ]);

        if($request->image != null) {

            $mediaItems = $templateCategory->getMedia('images');
            if(count($mediaItems) != 0) {
                $mediaItems[0]->delete();
            }
            $pathToFile = $this->createImage($request->image);
            $templateCategory->addMedia($pathToFile)
                    ->toMediaCollection('images');
        }

        $templateCategory->title = $request->title;
        $templateCategory->excerpt = $request->excerpt;
        $done = $templateCategory->save();

        if($done) {
            return response()->json(['message' => 'Category successfully updated!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TemplateCategory  $templateCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(TemplateCategory $templateCategory)
    {
        if($templateCategory->delete()){
            return response()->json(['Category successfully deleted!']);
        }else {
            return response()->json(['something worng, please try again']);
        }    }

    public function changeStatus($cid)
    {
        $templateCategory = TemplateCategory::where('id', $cid)->first();

        if($templateCategory->status === 0) {
            $status = 1;
        }else{
            $status = 0;
        }

        $templateCategory->status = $status;
        $done = $templateCategory->save();
        if($done) {
        return response()->json(['Category successfully updated!']);
        }
    }

    public function createImage($file) {

        $monthYear = date('FY');
        $imgName = Str::random();

        $folder_by_month = public_path().'/storage/';
        !file_exists($folder_by_month) && mkdir($folder_by_month , 0777, true);
        $fileName = $imgName.'.' . explode('/', explode(':', substr($file, 0, strpos($file, ';')))[1])[1];
        $pathToFile = public_path().'/storage/' . $fileName;
        Image::make($file)->save($pathToFile);

        return $pathToFile;
    }
}
