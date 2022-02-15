<?php

namespace App\Http\Controllers;

use App\Mail\PendingProofUpdate;
use App\Mail\UpdateorderMail;
use App\Models\Order;
use App\Models\PendingProof;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PendingProofController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pps = PendingProof::where('user_id', auth()->id())->get();
        return view('profile.proof.index', compact('pps'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PendingProof  $pendingProof
     * @return \Illuminate\Http\Response
     */
    public function show(PendingProof $pendingProof)
    {
        return view('profile.proof.show', compact('pendingProof'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PendingProof  $pendingProof
     * @return \Illuminate\Http\Response
     */
    public function edit(PendingProof $pendingProof)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PendingProof  $pendingProof
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pendingProof)
    {
        $pp = PendingProof::findOrFail($pendingProof);
        $order = Order::findOrFail($pp->order_id);
        $method = null;
        $modified = null;
        $total = null;

        if($request->price != $order->price_total){

            if ($request->price < $order->price_total) {
                $modified = $order->price_total - $request->price;
                $method = '-';
            }else{
                $method = '+';
                $modified =  $request->price - $order->price_total;
            }

            $order->price_old = $order->price_total;

        }

        $order->price_total = $request->price;
        $order->price_modified = $modified;
        $order->price_modification_reason = $request->message;
        $pp->status = 'approved';

        $order->save();
        $pp->save();

        $this->sendEmail($request->message, $pp);

        return redirect('/manage/pending-proofs/'.$pp->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PendingProof  $pendingProof
     * @return \Illuminate\Http\Response
     */
    public function destroy(PendingProof $pendingProof)
    {
        //
    }


    public function sendEmail ($message, $pp) {

        $subject = "Your pending proof <b>$pp->id</b> has been updated!";
        $sub = "Your pending proof has been updated!";

        $message = $subject. " " . $message . "if you have any question please contact us on +971 6 534 1113";

        $user = auth()->user();

        $data = array(
            'name' => $user->name,
            'sub' => $sub,
            'subject' => $subject,
            'link' => url("/profile/pending-proofs/$pp->id"),
            'message' => $message
        );

        Mail::to($user->email)->send(new PendingProofUpdate($data));

    }
}
