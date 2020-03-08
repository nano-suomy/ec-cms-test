<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goods;

class GoodsController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        if(!empty($keyword)){
            $goods = Goods::query()
                     ->where('title', 'like','%'.$keyword.'%')
                     ->orderBy('id','desc')
                     ->paginate(10);
        }else{
            $goods = Goods::query()
                     ->orderBy('id', 'desc')
                     ->paginate(10);
        }

        return view('goods.index', compact('goods', 'keyword'));
    }

    public function show($id)
    {
        $item = Goods::query()->findOrFail($id);
        return view('goods.show', compact('item', 'keyword'));
    }
}
