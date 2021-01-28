<?php

namespace App\Http\Controllers;

use App\Models\Estimate;
use App\Models\EstimateReply;
use App\Models\Order;
use App\Models\PendingProof;
use App\Models\User;
use Illuminate\Http\Request;

use Auth;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Session;

class ManagePages extends Controller
{

    public function __construct()
     {
        $this->middleware(['auth', 'role:admin']);
     }


    public function dashboard () {
        return view('manage.dashboard');
    }

    public function ManageUsers () {
        $users = User::paginate();
        return view('manage.user.index', compact('users'));
    }

    public function ManageUser (User $user) {
        return view('manage.user.show', compact('user'));
    }

    public function ManageUserOrders (User $user) {
        return view('manage.user.orders', compact('user'));
    }

    public function orders () {
        return view('manage.order.index');
    }

    public function order ($oid) {
        $order = Order::where('id', $oid)->first();
        // return $order;
        return view('manage.order.show', compact('order'));
    }

    public function pendingProofs () {
        return view('manage.proof.index');
    }

    public function pendingProof ($ppid) {
        $pp = PendingProof::where('id', $ppid)->first();
        return view('manage.proof.show', compact('pp'));
    }



}
