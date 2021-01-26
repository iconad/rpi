<?php

namespace App\Http\Controllers;

use App\Models\PageCategory;
use Illuminate\Http\Request;

class PageCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = PageCategory::all();
        return view('manage.page.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.page.category.create');
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


        $category = PageCategory::create([
            'title' => $request->title,
            'body' => $request->body,
        ]);


        if ($category) {
            $request->session()->flash('green', 'Category was successful added!');
            return redirect("/manage/page-categories/$category->id");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PageCategory  $pageCategory
     * @return \Illuminate\Http\Response
     */
    public function show(PageCategory $pageCategory)
    {
        return view('manage.page.category.show', compact('pageCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PageCategory  $pageCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(PageCategory $pageCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PageCategory  $pageCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PageCategory $pageCategory)
    {
        $request->validate([
            'title' => 'required',
        ]);


        $pageCategory->title = $request->title;
        $pageCategory->body = $request->body;

        $done = $pageCategory->save();

        if ($done) {
            $request->session()->flash('green', 'Category was successful updated!');
            return back();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PageCategory  $pageCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, PageCategory $pageCategory)
    {
        if($pageCategory->delete()){
            $request->session()->flash('green', 'Category successful deleted!');
            return redirect('/manage/page-categories');
        }else {
            $request->session()->flash('red', 'Something went wrong, Please try again!');
            return back();
        }
    }

    public function changeStatus($cid)
    {
        $pageCategory = PageCategory::where('id', $cid)->first();
        if($pageCategory->status === 0) {
            $status = 1;
        }else{
            $status = 0;
        }

        $pageCategory->status = $status;
        $done = $pageCategory->save();
        if($done) {
        return response()->json(['Status successfully updated!']);
        }
    }

    public function assignLabel(Request $request, PageCategory $pageCategory)
    {
        $pageCategory->label_id = $request->label;
        $done = $pageCategory->save();
        if($done) {
        return response()->json(['Category successfully updated!']);
        }
    }
}
