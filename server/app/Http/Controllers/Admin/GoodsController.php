<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Goods;

class GoodsController extends Controller
{
    public $createRules = [
        'title' => 'required',
        'image' => 'required',
        'price' => 'required',
        'description' => 'max:500'
    ];

    public $updateRules = [
        'title' => 'required',
        'price' => 'required',
        'description' => 'max:500'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goods = Goods::orderBy('id', 'desc')->paginate(50);
        return view('admin.goods.index', compact('goods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.goods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->createRules);
        $path = $request->file('image')->store('public/img');
        Goods::create([
            'title' => $request->get('title'),
            'image' => basename($path),
            'price' => $request->get('price'),
            'description' => $request->get('description')
        ]);
        \Session::flash('flash_message', '商品を追加しました。');
        return redirect('admin/goods');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Goods::findOrFail($id);
        return view('admin.goods.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Goods::findOrFail($id);
        return view('admin.goods.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, $this->updateRules);
        $path = !!$request->file('image') ? $request->file('image')->store('public/img') : null;
        $goods = Goods::findOrFail($id);
        if(isset($path)){
            $goods->update([
                'title' => $request->get('title'),
                'image' => basename($path),
                'price' => $request->get('price'),
                'description' => $request->get('description')
            ]);
        }else{
            $goods->update([
                'title' => $request->get('title'),
                'price' => $request->get('price'),
                'description' => $request->get('description')
            ]);
        }

        \Session::flash('flash_message', '商品を更新しました。');
        return redirect('admin/goods');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $goods = Goods::findOrFail($id);
        $goods->delete($id);
        \Session::flash('flash_message', '商品を削除しました。');
        return redirect('admin/goods');
    }
}
