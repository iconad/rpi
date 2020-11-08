<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\Product\gallery as ProductGallery;

class ProductApiController extends Controller
{
    public function productGallery(Request $request, Product $product) {
        return ProductGallery::collection($product->getMedia('product-gallery'));
    }
}
