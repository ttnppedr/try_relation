<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMenu;

class MenuController extends Controller
{
    public function store(StoreMenu $request)
    {
        $data = $request->validated();

        $flavors = $data['flavors'];
        unset($data['flavors']);

        $menu = Menu::create($data);
        $flavors = $menu->flavors()->createMany($flavors);

        return ['menu' => $menu, 'flavors' => $flavors];
    }
}
