<?php

namespace App\Http\Controllers;

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
        // $r = Role::find(1);
        // $r->givePermissionTo('browse admin');
        // return $r;

    }
}
