<?php

namespace App\GraphQL\Queries;
use App\Models\Menu;

class Menus
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        $menu = Menu::whereHas('categories', function ($query) {
            $query->where('status', '=', 1);
        })->get();


        return $menu;
    }
}
