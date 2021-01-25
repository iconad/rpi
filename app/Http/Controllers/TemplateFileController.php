<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Models\TemplateFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\File as Filee;
use Image;
use Illuminate\Support\Str;
use Spatie\Image\Image as SpatieImage;
use Spatie\Image\Manipulations;
use Illuminate\Support\Facades\Storage;

class TemplateFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $type, Template $template)
    {

            $this->validate(request(), [
                'file' => 'required',
            ]);

            if($request->file != null) {
                $pathToFile = $this->createImage($request->file);
            }


            $file = TemplateFile::create([
                'title' => $template->title . " " . "file",
                'type' => $type,
                'status' => 1,
                'template_id' => $template->id,
            ]);

            if($request->file != null) {
                $file->addMedia($pathToFile)
                        ->toMediaCollection('file');
            }

            if($file) {
                return response()->json(
                    [
                        'message' => 'File uploaded!',
                        'file_id' => $file->id
                    ]
                );
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TemplateFile  $templateFile
     * @return \Illuminate\Http\Response
     */
    public function show(TemplateFile $templateFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TemplateFile  $templateFile
     * @return \Illuminate\Http\Response
     */
    public function edit(TemplateFile $templateFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TemplateFile  $templateFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TemplateFile $templateFile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TemplateFile  $templateFile
     * @return \Illuminate\Http\Response
     */
    public function destroy($tid)
    {
        $templateFile = TemplateFile::where('id', $tid)->first();
        if($templateFile->delete()){
            return response()->json(['File successfully deleted!']);
        }else {
            return response()->json(['something worng, please try again']);
        }
    }

    public function createImage($file) {
        $file =  $file;
        $monthYear = date('FY');
        $imgName = Str::random();

        $path = public_path().'/storage/files/';
        !file_exists($path) && mkdir($path , 0777, true);
        $fileName = $imgName . '.' . $file->getClientOriginalExtension();
        $pathToFile = public_path().'/storage/files/' . $fileName;
        $pathToFile = $file->move($path, $fileName);

        return $pathToFile;
    }
}
