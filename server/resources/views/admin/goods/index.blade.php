@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">記事一覧</div>
                <div class="panel-body">
                    @if (Session::has('flash_message'))
                        <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
                    @endif

                    <div class="mb10">
                        {!! link_to('admin/goods/create', '新規作成', ['class' => 'btn btn-primary']) !!}
                    </div>

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
                                <td><img src="{{ asset('/storage/img/'.$item->image) }}"></td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->created_at->format('Y年m月d日') }}</td>
                                <td>
                                    {!! link_to_action('Admin\GoodsController@show', '表示', [$item->id]) !!}
                                    {!! link_to_action('Admin\GoodsController@edit', '編集', [$item->id]) !!}
                                    {!! Form::model($item,
                                    ['url' => [
                                        'admin/goods', $item->id],
                                        'method' => 'delete',
                                        'class' => 'delete-from'
                                    ]) !!}
                                        {!! Form::submit('削除', [
                                            'onclick' => "return confirm('本当に削除しますか?')",
                                            'class' => 'text-link'
                                            ]) !!}
                                    {!! Form::close() !!}
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
