<div class="form-group">
    {!! Form::label('title', 'タイトル:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('image', '画像:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::file('image') !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('price', '値段:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('price', null, ['class' => 'form-controll']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('description', '説明:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
        {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
        {!! link_to('admin/goods', '一覧へ戻る', ['class' => 'btn btn-default']) !!}
    </div>
</div>
