@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>編集</h1>
                </div>
                <div class="panel-body">

                    {{-- エラーの表示 --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (isset($item))
                        {!! Form::model($item,
                            ['url' => [
                                'admin/goods', $item->id],
                                'method' => 'PATCH',
                                'files' => true,
                                'class' => 'form-horizontal',
                                'id' => 'item-input'
                            ]) !!}
                        @include('admin.goods.fields')
                        {!! Form::close() !!}
                    @else
                        <p>no items</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
