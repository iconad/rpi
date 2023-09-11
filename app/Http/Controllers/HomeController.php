<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function getProducts()
    {
        return Product::all();
    }


    public function index()
    {
        try {
            // Example query using Eloquent to fetch products
            $products = Product::all();

            // Pass the products to the home view
            return view('home', ['products' => $products]);
        } catch (\Exception $e) {
            // Handle any exceptions or errors here
            return view('home', ['products' => null])->with('error', 'Error fetching products: ' . $e->getMessage());
        }
    }
}
