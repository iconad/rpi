<?php

namespace App\Http\Controllers;

use App\Models\Finishing;
use App\Models\FinishingOption;
use Illuminate\Http\Request;
use Image;
use File;
use Illuminate\Support\Str;
use Spatie\Image\Image as SpatieImage;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class FinishingOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($finishid)
    {
        $options = FinishingOption::where('finishing_id', $finishid)->get();
        return view('manage.finishing.option.index', compact('options', 'finishid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($finishid)
    {
        return view('manage.finishing.option.create', compact('finishid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $finishid)
    {

        $this->validate(request(), [
            'title' => 'required',
        ]);

        if($request->image != null) {
            $pathToFile = $this->createImage($request->image);
        }


        $finishoption = FinishingOption::create([
            'title' => $request->title,
            'price' => $request->price,
            'days' => $request->days,
            'finishing_id' => $finishid,
        ]);

        if($request->image != null) {
            $finishoption->addMedia($pathToFile)
                    ->toMediaCollection('images');
        }

        if($finishoption) {
            return response()->json(['message' => 'Option successfully added!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FinishingOption  $finishingOption
     * @return \Illuminate\Http\Response
     */
    public function show(FinishingOption $finishingOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FinishingOption  $finishingOption
     * @return \Illuminate\Http\Response
     */
    public function edit(FinishingOption $finishingOption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FinishingOption  $finishingOption
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $finishid, $finishingOption)
    {

        $finishingOption = FinishingOption::where('id', $finishingOption)->first();

        $this->validate(request(), [
            'title' => 'required',
        ]);

        if($request->image != null) {

            $mediaItems = $finishingOption->getMedia('images');
            if(count($mediaItems) != 0) {
                $mediaItems[0]->delete();
            }
            $pathToFile = $this->createImage($request->image);
            $finishingOption->addMedia($pathToFile)
                    ->toMediaCollection('images');
        }

        $finishingOption->title = $request->title;
        $finishingOption->price = $request->price;
        $finishingOption->days = $request->days;
        $finishingOption->finishing_id = $finishid;
        $done = $finishingOption->save();

        if($done) {
            return response()->json(['message' => 'Option successfully updated!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FinishingOption  $finishingOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $finishid, $FinishingOption)
    {
        $finishingOption = FinishingOption::where('id', $FinishingOption)->first();
        if($finishingOption->delete()){
            return response()->json(['Option successfully deleted!']);
        }else {
            return response()->json(['something worng, please try again']);
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
