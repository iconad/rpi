<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductHome; // Import your model
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $products = Producthome::all(); // Retrieve products from the database
        return view('home', compact('products')); // Pass products to the view
    }
}
