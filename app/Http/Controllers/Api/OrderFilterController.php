<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Menu\MainMenu;
use App\Models\PackagePrice;

class OrderFilterController extends Controller
{
    public function paperPrice (Request $request) {

        // $menu = MainMenu::collection(Menu::whereHas('categories', function ($query) {
        //     $query->where('status', 1);
        // })->get());

        // return $request->size['id'];


        $sizeId = $request->size['id'];

        $pp = PackagePrice::where('quantity', $request->quantity)
            ->with('sizes', function ($query) use ($sizeId) {
                $query->where('size_id', $sizeId);
            })
            ->first();

            // return $pp;

            return response()->json(
                [
                    "result" => $pp->sizes[0],
                ]
            );

    }
}
