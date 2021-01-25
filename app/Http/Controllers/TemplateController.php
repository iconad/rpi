<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Models\TemplateCategory;
use Illuminate\Http\Request;
use Image;
use File;
use Illuminate\Support\Str;
use Spatie\Image\Image as SpatieImage;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cid)
    {
        return view('manage.template.index', compact('cid'));
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
    public function store(Request $request, $cid)
    {

        $this->validate(request(), [
            'title' => 'required',
            'size' => 'required',
            'thumbnail' => 'required',
        ]);


        if($request->thumbnail != null) {
            $pathToFile = $this->createImage($request->thumbnail);
        }

        $finishoption = Template::create([
            'title' => $request->title,
            'size' => $request->size,
            'template_category_id' => $cid,
            'excerpt' => $request->excerpt,
        ]);

        if($request->thumbnail != null) {
            $finishoption->addMedia($pathToFile)
                    ->toMediaCollection('images');
        }

        if($finishoption) {
            return response()->json(['message' => 'Template successfully updated!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function show(Template $template)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function edit(Template $template)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cid, Template $template)
    {
        $this->validate(request(), [
            'title' => 'required',
            'size' => 'required',
            'thumbnail' => 'required',
        ]);

        if($request->thumbnail != null) {

            $mediaItems = $template->getMedia('images');
            if(count($mediaItems) != 0) {
                $mediaItems[0]->delete();
            }
            $pathToFile = $this->createImage($request->thumbnail);
            $template->addMedia($pathToFile)
                    ->toMediaCollection('images');
        }

        $template->title = $request->title;
        $template->size = $request->size;
        $template->excerpt = $request->excerpt;
        $done = $template->save();

        if($done) {
            return response()->json(['message' => 'Template successfully updated!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function destroy($cid, Template $template)
    {
        if($template->delete()){
            return response()->json(['Template successfully deleted!']);
        }else {
            return response()->json(['something worng, please try again']);
        }    }

    public function changeStatus($cid)
    {
        $template = Template::where('id', $cid)->first();

        if($template->status === 0) {
            $status = 1;
        }else{
            $status = 0;
        }

        $template->status = $status;
        $done = $template->save();
        if($done) {
        return response()->json(['Template successfully updated!']);
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
