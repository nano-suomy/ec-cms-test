<?php

namespace App\Http\Controllers;

use App\Goods;

class GoodsController extends Controller
{
    public function index()
    {
        $goods = Goods::query()->orderBy('id', 'desc')->paginate(20);
        return view('goods.index', compact('goods'));
    }

    public function show($id)
    {
        $item = Goods::query()->findOrFail($id);
        return view('goods.show', compact('item'));
    }
}
