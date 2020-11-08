<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manage.menu.index');
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
            'title' => 'required'
        ]);

        $done = Menu::create([
            'title' => $request->title,
            'user_id' => auth()->id(),
        ]);


        if($done) {
            return response()->json(['message' => 'Menu successfully added!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $this->validate(request(), [
            'title' => 'required'
        ]);
        $menu->title = $request->title;
        $done = $menu->save();
        if($done) {
            return response()->json(['message' => 'Menu successfully updated!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        if($menu->delete()){
            return response()->json(['Menu successfully deleted!']);
        }else {
            return response()->json(['something worng, please try again']);
        }
    }

    public function changeStatus(Menu $menu)
    {
        if($menu->status === 0) {
            $status = 1;
        }else{
            $status = 0;
        }

        $menu->status = $status;
        $done = $menu->save();
        if($done) {
        return response()->json(['Status successfully updated!']);
        }
    }

    public function assignLabel(Request $request, Menu $menu)
    {
        $menu->label_id = $request->label;
        $done = $menu->save();
        if($done) {
        return response()->json(['Menu successfully updated!']);
        }
    }


}
