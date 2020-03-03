@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">記事詳細</div>
                <div class="panel-body">
                    <div>
                        <h1>{{$item->title}}</h1>
                        <img src="{{ asset('/storage/img/'.$item->image) }}">
                        <p>{{$item->price}}</p>
                        <p>{{$item->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
