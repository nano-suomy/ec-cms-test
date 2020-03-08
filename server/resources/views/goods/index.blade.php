@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>商品一覧</h1>
                    </div>
                    <div class="panel-body">
                        <div>
                            <form class="form-inline" action="{{ url('/goods') }}">
                                <input type="text" name="keyword" value="{{ $keyword }}" size="50" class="form-control" placeholder="検索">
                                <input type="submit" value="検索" class="btn btn-info">
                            </form>
                        </div>
                        <div class="goods">
                            @foreach($goods as $item)
                                <div class="goods-container">
                                    <div class="goods-img-container">
                                        <img class="goods-img" alt="item" src="{{ asset('/storage/img/'.$item->image) }}">
                                    </div>
                                    <div class="goods-body">
                                        <p>{!! link_to_action('GoodsController@show', $item->title, [$item->id]) !!}</p>
                                        <p>評価: 0000</p>
                                        <p class="goods-price">{{ $item->price }}円</p>
                                        <p>発売日: {{ $item->created_at->format('Y年m月d日') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {!! $goods->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
