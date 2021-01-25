<?php

namespace App\Http\Controllers;

use App\Mail\EstimateResponseEmailToUser;
use App\Models\Estimate;
use App\Models\EstimateReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EstimateReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $responses = EstimateReply::paginate();
        return view('manage.estimate.response.index', compact('responses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Estimate $estimate)
    {
        return view('manage.estimate.response.create', compact('estimate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Estimate $estimate)
    {
        $this->validate(request(), [
            'message' => 'required',
        ]);

        $reply = EstimateReply::create([
            'message' => $request->message,
            'estimate_id' => $estimate->id,
        ]);

        if ($reply->save()) {


            $subject = "Estimate response from RPI";


            $message = $request->message . " if you have any question please contact us on +971 000 00000";

            $data = array(
                'name' => $request->first_name,
                'subject' => $subject,
                'message' => $message
            );

            Mail::to($estimate->email)->send(new EstimateResponseEmailToUser($data));

            $request->session()->flash('green', 'Response email has been successfully sent to ' . $estimate->first_name  . ' !');
            return redirect("/manage/estimates/$estimate->id");
        }else{
            $request->session()->flash('red', 'Something wront! Please try again.');
            return redirect("/manage/estimates/$estimate->id/responses/create");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EstimateReply  $estimateReply
     * @return \Illuminate\Http\Response
     */
    public function show(EstimateReply $estimateReply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EstimateReply  $estimateReply
     * @return \Illuminate\Http\Response
     */
    public function edit(EstimateReply $estimateReply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EstimateReply  $estimateReply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EstimateReply $estimateReply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EstimateReply  $estimateReply
     * @return \Illuminate\Http\Response
     */
    public function destroy(EstimateReply $estimateReply)
    {
        //
    }
}
