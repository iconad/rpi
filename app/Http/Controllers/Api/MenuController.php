<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Http\Resources\Menu\MainMenu;


class MenuController extends Controller
{
    public function MainMenu () {

        $menu = MainMenu::collection(Menu::whereHas('categories', function ($query) {
            $query->where('status', 1);
        })->get());
        return $menu;

    }
}
