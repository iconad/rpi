<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cid)
    {
        $pages = Page::where('page_category_id', $cid)->get();
        return view('manage.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($cid)
    {
        return view('manage.page.create', compact('cid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $cid)
    {
        $request->validate([
            'title' => 'required'
        ]);


        $page = Page::create([
            'title' => $request->title,
            'short_title' => $request->short_title,
            'page_category_id' => $cid,
            'body' => $request->body,
        ]);


        if ($page) {
            $request->session()->flash('green', 'Page was successful added!');
            return redirect("/manage/page-categories/$cid/pages/$page->id");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show($cid, Page $page)
    {
        return view('manage.page.show', compact('cid', 'page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cid, Page $page)
    {
        $request->validate([
            'title' => 'required',
        ]);


        $page->title = $request->title;
        $page->short_title = $request->short_title;
        $page->body = $request->body;

        $done = $page->save();

        if ($done) {
            $request->session()->flash('green', 'page was successful updated!');
            return back();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $cid, Page $page)
    {
        if($page->delete()){
            $request->session()->flash('green', 'page successful deleted!');
            return redirect('/manage/page-categories');
        }else {
            $request->session()->flash('red', 'Something went wrong, Please try again!');
            return back();
        }
    }

    public function changeStatus($cid, $pid)
    {
        $page = Page::where('id', $pid)->first();
        if($page->status === 0) {
            $status = 1;
        }else{
            $status = 0;
        }

        $page->status = $status;
        $done = $page->save();
        if($done) {
        return response()->json(['Status successfully updated!']);
        }
    }

    public function assignLabel(Request $request, $cid, Page $page)
    {
        $page->label_id = $request->label;
        $done = $page->save();
        if($done) {
        return response()->json(['Page successfully updated!']);
        }
    }
}
