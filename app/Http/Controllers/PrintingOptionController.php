<?php

namespace App\Http\Controllers;

use App\Models\PrintingOption;
use Illuminate\Http\Request;
use Image;
use File;
use Illuminate\Support\Str;
use Spatie\Image\Image as SpatieImage;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PrintingOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($printid)
    {
        $options = PrintingOption::where('printing_id', $printid)->get();
        return view('manage.printing.option.index', compact('options', 'printid'));
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
    public function store(Request $request, $printid)
    {

        $this->validate(request(), [
            'title' => 'required',
            'size' => 'required',
            'type' => 'required',
        ]);

        if($request->image != null) {
            $pathToFile = $this->createImage($request->image);
        }


        $finishoption = PrintingOption::create([
            'title' => $request->title,
            'price' => $request->price,
            'days' => $request->days,
            'type' => $request->type,
            'selection_type' => $request->selection_type,
            'size' => $request->size,
            'printing_id' => $printid,
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
     * @param  \App\Models\PrintingOption  $printingOption
     * @return \Illuminate\Http\Response
     */
    public function show(PrintingOption $printingOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PrintingOption  $printingOption
     * @return \Illuminate\Http\Response
     */
    public function edit(PrintingOption $printingOption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PrintingOption  $printingOption
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $printid, $printingOption)
    {

        $printingOption = PrintingOption::where('id', $printingOption)->first();

        $this->validate(request(), [
            'title' => 'required',
        ]);

        if($request->image != null) {

            $mediaItems = $printingOption->getMedia('images');
            if(count($mediaItems) != 0) {
                $mediaItems[0]->delete();
            }
            $pathToFile = $this->createImage($request->image);
            $printingOption->addMedia($pathToFile)
                    ->toMediaCollection('images');
        }

        $printingOption->title = $request->title;
        $printingOption->price = $request->price;
        $printingOption->days = $request->days;
        $printingOption->type = $request->type;
        $printingOption->selection_type = $request->selection_type;
        $printingOption->size = $request->size;
        $printingOption->printing_id = $printid;
        $done = $printingOption->save();

        if($done) {
            return response()->json(['message' => 'Option successfully updated!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PrintingOption  $printingOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $printid, $PrintingOption)
    {
        $PrintingOption = PrintingOption::where('id', $PrintingOption)->first();
        if($PrintingOption->delete()){
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
