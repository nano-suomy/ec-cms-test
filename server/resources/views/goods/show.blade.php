@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="item-head">{{$item->title}}</h1>
                    </div>
                    <div class="panel-body">
                        <div class="item-container">
                            <div class="img-container">
                                <img class="item-img" alt="item" src="{{ asset('/storage/img/'.$item->image) }}">
                            </div>
                            <div class="detail-container">
                                <div class="item-price">
                                    <p>発売日: {{ $item->created_at->format('Y年m月d日') }}</p>
                                    <p>{{$item->price}}円</p>
                                </div>
                                <div class="item-body">
                                    <h2>詳細</h2>
                                    <p>{{$item->description}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
