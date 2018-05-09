@extends('layouts.admin')

@section('title', 'Tạo category')

@section('content_header')
    <h1>Tạo category</h1>
@stop

@section('content')
    <div>
        <div class="u-maxWidth450 u-marginAuto u-marginTop30">
            <form action="/admin/categories" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name_vn">Tên tiếng Việt</label>
                    <input type="text" class="form-control" id="name_vn" name=
                    "name_vn" required="true">
                </div>
                <div class="form-group">
                    <label for="name_jp">Tên tiếng Nhật</label>
                    <input type="text" class="form-control" id="name_jp" name="name_jp">
                </div>
                <button type="submit" class="btn btn-primary btn-block pull-right">Tạo category</button>
            </form>
        </div>
    </div>
@stop
