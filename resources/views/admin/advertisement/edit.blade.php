@extends('layouts.admin')

@section('title', 'Chỉnh sửa quảng cáo')

@section('content_header')
    <h1>Chỉnh sửa quảng cáo</h1>
@stop

@section('content')
    <div class="u-maxWidth450 u-marginAuto u-marginTop30">
        <form action="/admin/advertisements/{{$advertisement->id}}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label for="url_vn">Url tiếng Việt</label>
                <input type="text" class="form-control" id="url_vn" name="url_vn" value="{{$advertisement->url_vn}}">
            </div>
            <div class="form-group">
                <label for="url_jp">Url tiếng Nhật</label>
                <input type="text" class="form-control" id="url_jp" name="url_jp" value="{{$advertisement->url_jp}}">
            </div>
            <button type="submit" class="btn btn-primary btn-block pull-right">Lưu cập nhật</button>
        </form>
    </div>
@stop	