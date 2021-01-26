<?php

namespace App\Http\Controllers;

use App\Mail\UpdateorderMail;
use App\Models\Order;
use App\Models\PendingProof;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();
        return view('profile.order.index', compact('orders'));
    }

    // public function getOrdersByStatus($status)
    // {
    //     $allstatus = ['cart', 'pending', 'confirmed', 'onhold', 'delivered', 'rejected'];

    //     if (!in_array($status, $allstatus)) {
    //         $orders = Order::where('user_id', Auth::user()->id)->get();
    //     }else{
    //         $orders = Order::where('status', $status)
    //         ->where('user_id', Auth::user()->id)->get();
    //     }

    //     return view('profile.order.index', compact('orders'));
    // }

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
            'product_id' => 'required',
            'title' => 'required',
            'price_total' => 'required',
        ]);

        $order = Order::create([
            'title' => $request->title,
            'paper_size' => $request->paper_size,
            'paper_color' => $request->paper_color,
            'paper' => $request->paper,
            'paper_quantity' => $request->paper_quantity,
            'gift_quantity' => $request->gift_quantity,
            'paper_finishings' => $request->paper_finishings,
            'shirt_color' => $request->shirt_color,
            'gift_color' => $request->gift_color,
            'shirt_sizes' => $request->shirt_sizes,
            'shirt_printings' => $request->shirt_printings,
            'turnaround' => $request->turnaround,
            'price_product' => $request->price_product,
            'price_extra' => $request->price_extra,
            'price_printing' => $request->price_printing,
            'price_vat' => $request->price_vat,
            'price_total' => $request->price_total,
            'product_type' => $request->product_type,
            'product_id' => $request->product_id,
            'is_design' => $request->is_design,
            'status' => $request->status,
            'user_id' => auth()->id(),
        ]);

        if($order) {
            return response()->json(
                [
                    'status' => true,
                    'orderid' => $order->id,
                    'message' => 'Successfully added to cart!',
                ]
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        if(Auth::user()->id === $order->user_id){
            return view('profile.order.single', compact('order'));
        }else{
            return redirect('/profile');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $this->validate(request(), [
            'status' => 'required',
        ]);

        $order->message = $request->message;
        $order->status = $request->status;
        $done = $order->save();

        if($done) {
            return response()->json(
                ['message' => 'Successfully updated!']
            );
        }
    }

    public function updateOrder(Request $request, Order $order)
    {
        $this->validate(request(), [
            'status' => 'required',
        ]);



        $order->status = $request->status;

        $user = User::where('id', $request->user_id)->first();

        if($request->status == 'confirmed') {
            $msg = $this->orderConfirmed($user, $order, $order->status, $request->message, $request);
            if ($msg) {
                $order->save();
                $request->session()->flash('green', 'Order has been updated successfully!');
                return redirect("/manage/orders/$order->id");
            }else{
                $request->session()->flash('red', 'Pending Proof already exist!');
                return redirect("/manage/orders/$order->id");
            }}
        elseif($request->status == 'cart') {

            $msg = $this->orderCart($user, $order, $request->status, $request->message);

            if ($msg) {
                $order->save();
                $request->session()->flash('green', 'Order has been successfully updated!');
                return redirect("/manage/orders/$order->id");
            }else{
                $request->session()->flash('red', 'Something went wront! pelase try again');
                return redirect("/manage/orders/$order->id");
            }


        }elseif($request->status == 'pending') {

            $msg = $this->orderPending($user, $order, $order->status, $request->message);

            if ($msg) {
                $order->save();
                $request->session()->flash('green', 'Order has been successfully updated!');
                return redirect("/manage/orders/$order->id");
            }else{
                $request->session()->flash('red', 'Something went wront! pelase try again');
                return redirect("/manage/orders/$order->id");
            }

        }elseif($request->status == 'rejected') {

            $msg = $this->orderRejected($user, $order, $order->status, $request->message);

            if ($msg) {
                $order->save();
                $request->session()->flash('green', 'Order has been successfully updated!');
                return redirect("/manage/orders/$order->id");
            }else{
                $request->session()->flash('red', 'Something went wront! pelase try again');
                return redirect("/manage/orders/$order->id");
            }

        }elseif($request->status == 'on-hold') {

            $msg = $this->orderOnHold($user, $order, $order->status, $request->message);

            if ($msg) {
                $order->save();
                $request->session()->flash('green', 'Order has been successfully updated!');
                return redirect("/manage/orders/$order->id");
            }else{
                $request->session()->flash('red', 'Something went wront! pelase try again');
                return redirect("/manage/orders/$order->id");
            }


        }elseif($request->status == 'cancelled') {

            $msg = $this->orderCancelled($user, $order, $order->status, $request->message);
            if ($msg) {
                $order->save();
                $request->session()->flash('green', 'Order has been successfully cancelled');
                return redirect("/manage/orders/$order->id");
            }else{
                $request->session()->flash('red', 'Something went wront! pelase try again');
                return redirect("/manage/orders/$order->id");
            }

        }elseif($request->status == 'delivered') {

            $msg = $this->orderDelivered($user, $order, $order->status, $request->message);
            if ($msg) {
                $order->save();
                $request->session()->flash('green', 'Order has been successfully Delivered');
                return redirect("/manage/orders/$order->id");
            }else{
                $request->session()->flash('red', 'Something went wront! pelase try again');
                return redirect("/manage/orders/$order->id");
            }

        }

    }

    public function orderConfirmed ($user, $order, $status, $message, Request $request) {

        if(!$order->pendingproof) {

            $pp = PendingProof::create([
                'status' => "pending",
                'order_id' => $order->id,
                'user_id' => $user->id,
            ]);

        }else{

            if($order->pendingproof->status == 'declined') {

                $pp = PendingProof::where('order_id', $order->id)->first();
                $pp->status = 'pending';
                $pp->save();

            }else{
                return false;
            }

        }


        $subject = "Your order <b>$order->id</b> has been approved!";
        $sub = "Your order has been approved!";


        $message = $subject. " " . $message . " Please click on the below link for you payment in order to process your order " . "if you have any question please contact us on +971 000 00000";


        $data = array(
            'name' => $user->name,
            'sub' => $sub,
            'subject' => $subject,
            'link' => url("/profile/pending-proofs/$pp->id"),
            'message' => $message
        );

        Mail::to($user->email)->send(new UpdateorderMail($data));

        return true;

    }


    public function orderCart ($user, $order, $status, $message) {


        $subject = "You order <b>$order->id</b> has been moved back to $status";
        $sub = "Your order has been moved back to $status";

        $message = $subject ." " . $message . " if you have any question please contact us on +971 000 00000";

        $pp = PendingProof::where('order_id', $order->id)->first();
        $pp->status = 'decline';
        $pp->save();

        $data = array(
            'name' => $user->name,
            'sub' => $sub,
            'subject' => $subject,
            'message' => $message
        );

        Mail::to($user->email)->send(new UpdateorderMail($data));

        return true;

    }

    public function orderRejected ($user, $order, $status, $message) {

        $subject = "Your order <b>$order->id</b> has been rejected!";
        $sub = "Your order has been rejected!";

        $message = $subject. " " . $message . " " . "if you have any question please contact us on +971 000 00000";

        $pp = PendingProof::where('order_id', $order->id)->first();
        $pp->status = 'declined';
        $pp->save();

        $data = array(
            'name' => $user->name,
            'sub' => $sub,
            'subject' => $subject,
            'message' => $message
        );

        Mail::to($user->email)->send(new UpdateorderMail($data));

        return true;

    }

    public function orderOnHold ($user, $order, $status, $message) {

        $subject = "Your order <b>$order->id</b> has been put on hold!";
        $sub = "Your order has been put on hold!";

        $message = $subject. " " . $message . " " . "if you have any question please contact us on +971 000 00000";

        $pp = PendingProof::where('order_id', $order->id)->first();
        $pp->status = 'declined';
        $pp->save();

        $data = array(
            'name' => $user->name,
            'sub' => $sub,
            'subject' => $subject,
            'message' => $message
        );

        Mail::to($user->email)->send(new UpdateorderMail($data));

        return true;

    }

    public function orderPending ($user, $order, $status, $message) {

        $subject = "Your order <b>$order->id</b> has been put on pending!";
        $sub = "Your order has been put on pending!";

        $message = $subject. " " . $message . " " . "if you have any question please contact us on +971 000 00000";

        $pp = PendingProof::where('order_id', $order->id)->first();
        $pp->status = 'declined';
        $pp->save();

        $data = array(
            'name' => $user->name,
            'sub' => $sub,
            'subject' => $subject,
            'message' => $message
        );

        Mail::to($user->email)->send(new UpdateorderMail($data));

        return true;

    }

    public function orderCancelled ($user, $order, $status, $message) {

        $subject = "Your order <b>$order->id</b> has been cancelled!";
        $sub = "Your order has been cancelled!";

        $message = $subject. " " . $message . " " . "if you have any question please contact us on +971 000 00000";

        $pp = PendingProof::where('order_id', $order->id)->first();
        $pp->status = 'declined';
        $pp->save();

        $data = array(
            'name' => $user->name,
            'sub' => $sub,
            'subject' => $subject,
            'message' => $message
        );

        Mail::to($user->email)->send(new UpdateorderMail($data));

        return true;

    }

    public function orderDelivered ($user, $order, $status, $message) {

        $subject = "Your order <b>$order->id</b> has been delivered!";
        $sub = "Your order has been delivered!";

        $message = $subject. " " . $message . " " . "if you have any question please contact us on +971 000 00000";

        $pp = PendingProof::where('order_id', $order->id)->first();
        $pp->status = 'paid';
        $pp->save();

        $data = array(
            'name' => $user->name,
            'sub' => $sub,
            'subject' => $subject,
            'message' => $message
        );

        Mail::to($user->email)->send(new UpdateorderMail($data));

        return true;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        if($order->delete()){
            return response()->json(['Successfully deleted!']);
        }else {
            return response()->json(['something worng, please try again']);
        }
    }


}
