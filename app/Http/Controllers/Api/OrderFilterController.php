<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Menu\MainMenu;
use App\Models\Package;
use App\Models\PackagePrice;
use App\Models\Paper;
use App\Models\Product;
use App\Models\Size;

class OrderFilterController extends Controller
{
    public function paperPrice (Request $request) {

        // return $request;

        $pkgid = $request->package['id'];
        $quantity = $request->quantity;
        $sizeId = $request->size['id'];
        $paperId = $request->package['paper_id'];

        // ====== Geting Quanity on Size Select =======
        $quantities = Paper::join('packages', 'papers.id', 'packages.paper_id')
                                ->join('package_prices', 'packages.id', 'package_prices.package_id')
                                ->join('package_price_sizes', 'package_price_sizes.package_price_id', 'package_prices.id')
                                ->join('sizes', 'package_price_sizes.size_id', 'sizes.id')
                                ->select(
                                    'papers.id as paper_id',
                                    'packages.id as pkg_id',
                                    'package_prices.id as package_prices_id',
                                    'package_prices.quantity',
                                    'package_price_sizes.price',
                                    'sizes.id as size_id',
                                    'sizes.region',
                                )
                                ->where('papers.id', $paperId)
                                ->where('sizes.id', $sizeId)
                                ->pluck('package_prices.quantity');


        // =========  Geting Price on Quanity and Size  =========
        $item = Paper::join('packages', 'papers.id', 'packages.paper_id')
                        ->join('package_prices', 'packages.id', 'package_prices.package_id')
                        ->join('package_price_sizes', 'package_price_sizes.package_price_id', 'package_prices.id')
                        ->join('sizes', 'package_price_sizes.size_id', 'sizes.id')
                        ->select(
                            'papers.id as paper_id',
                            'packages.id as pkg_id',
                            'package_prices.id as package_prices_id',
                            'package_prices.quantity',
                            'package_price_sizes.price',
                            'package_price_sizes.id as package_price_size_id',
                            'sizes.id as size_id',
                            'sizes.region',
                         )
                        ->where('papers.id', $paperId)
                        ->where('sizes.id', $sizeId)
                        ->where('package_prices.quantity', $quantity)
                        ->first();

        return response()->json(
            [
                "result" => $item,
                "quantities" => $quantities,
            ]
        );

    }
}
