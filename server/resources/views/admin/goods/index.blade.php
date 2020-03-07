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
                    <div class="goods-new">
                        {!! link_to('admin/goods/create', '新規作成', ['class' => 'btn btn-primary']) !!}
                    </div>

                    @if (Session::has('flash_message'))
                        <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
                    @endif

                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>画像</th>
                                <th>タイトル</th>
                                <th>値段</th>
                                <th>追加日</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        @foreach($goods as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    <div class="goods-img-container-cms">
                                        <img class="goods-img" alt="item" src="{{ asset('/storage/img/'.$item->image) }}">
                                    </div>
                                </td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->created_at->format('Y年m月d日') }}</td>
                                <td class="goods-action">
                                    <div>
                                        {!! link_to_action('Admin\GoodsController@show', '表示', [$item->id], ['class' => 'btn btn-primary']) !!}
                                    </div>
                                    <div>
                                        {!! link_to_action('Admin\GoodsController@edit', '編集', [$item->id], ['class' => 'btn btn-primary']) !!}
                                    </div>
                                    <div>
                                        {!! Form::model($item,
                                        ['url' => [
                                            'admin/goods', $item->id],
                                            'method' => 'delete',
                                            'class' => 'delete-from'
                                        ]) !!}
                                        {!! Form::submit('削除', [
                                            'onclick' => "return confirm('本当に削除しますか?')",
                                            'class' => 'text-link btn btn-primary'
                                        ]) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                    {!! $goods->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
