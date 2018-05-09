@extends('layouts.admin')

@section('title', 'Tạo quảng cáo ')

@section('content_header')
    <h1>Tạo quảng cáo </h1>
@stop

@section('content')
    <div>
        <div class="u-maxWidth450 u-marginAuto u-marginTop30">
            <form action="/admin/advertisements" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="url_vn">Url tiếng Việt</label>
                    <input type="text" class="form-control" id="url_vn" name=
                    "url_vn">
                </div>
                <div class="form-group">
                    <label for="url_jp">Url tiếng Nhật</label>
                    <input type="text" class="form-control" id="url_jp" name="url_jp">
                </div>
                <button type="submit" class="btn btn-primary btn-block pull-right">Tạo quảng cáo </button>
            </form>
        </div>
    </div>
@stop
