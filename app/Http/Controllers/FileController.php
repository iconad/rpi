<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\File as Filee;
use Image;
use Illuminate\Support\Str;
use Spatie\Image\Image as SpatieImage;
use Spatie\Image\Manipulations;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
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
    public function store(Request $request, Order $order)
    {

        // return $request;

        if(Auth::user()->id === $request->user_id){


            $this->validate(request(), [
                'user_id' => 'required',
                'order_id' => 'required',
                'file' => 'required',
                'type' => 'required',
            ]);

            $order = Order::where('id', $request->id)->first();


        }else{
            return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order, File $file)
    {
        if($file->delete()){
            return response()->json(['File successfully deleted!']);
        }else {
            return response()->json(['something worng, please try again']);
        }
    }

    public function uploadYourDesign(Order $order)
    {
        if(Auth::user()->id === $order->user_id){


            if($order->status == 'cart') {
                $files = $order->files;
                return view('upload-your-design', compact('order', 'files'));
            }else{
                return redirect('/profile/orders/'.$order->id);
            }
        }else{
            return redirect('/');
        }
    }

    public function addCloudFile(Request $request, Order $order) {

        if(Auth::user()->id === $order->user_id){

            $this->validate(request(), [
                'cloud' => 'required',
            ]);

            $file = File::create([
                'title' => $order->title . " " . "file",
                'user_id' => Auth::user()->id,
                'type' => "cloud",
                'order_id' => $order->id,
                'cloud' => $request->cloud,
                'user_id' => auth()->id(),
            ]);

            if($file) {
                return response()->json(
                    [
                        'message' => 'File uploaded!',
                        'file_id' => $file->id
                    ]
                );
            }

        }else{
            return redirect('/');
        }
    }

    public function storeFile(Request $request, Order $order)
    {

        if(Auth::user()->id === $order->user_id){

            $this->validate(request(), [
                'file' => 'required',
            ]);

            if($request->file != null) {
                $pathToFile = $this->createImage($request->file);
            }


            $file = File::create([
                'title' => $order->title . " " . "file",
                'user_id' => Auth::user()->id,
                'type' => "file",
                'order_id' => $order->id,
                'user_id' => auth()->id(),
            ]);

            if($request->file != null) {
                $file->addMedia($pathToFile)
                        ->toMediaCollection('order_design');
            }

            if($file) {
                return response()->json(
                    [
                        'message' => 'File uploaded!',
                        'file_id' => $file->id
                    ]
                );
            }

        }else{
            return redirect('/');
        }
    }

    public function createImage($file) {
        $file =  $file;
        $monthYear = date('FY');
        $imgName = Str::random();

        $path = public_path().'/storage/orders/';
        !file_exists($path) && mkdir($path , 0777, true);
        $fileName = $imgName . '.' . $file->getClientOriginalExtension();
        $pathToFile = public_path().'/storage/orders/' . $fileName;
        $pathToFile = $file->move($path, $fileName);

        return $pathToFile;
    }

}
