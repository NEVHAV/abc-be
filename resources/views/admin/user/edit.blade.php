@extends('layouts.admin')

@section('title', 'Chỉnh sửa người dùng')

@section('content_header')
    <h1>Chỉnh sửa người dùng</h1>
@stop

@section('content')
    <div class="u-maxWidth450 u-marginAuto u-marginTop30">
        <form action="/admin/users/{{$user->id}}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label for="name">Tên người dùng</label>
                <input type="text" class="form-control" id="name" name=
                "name" value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" name="password" value="{{$user->password}}">
            </div>
            <div class="form-group">
                <label for="mode">Quyền hạn</label>
                <select id="mode"
                        class="select2 u-sizeFullWidth"
                        name="mode">
                    <option value="0">Quản trị viên</option>
                    <option value="1">Biên tập viên</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block pull-right">Lưu cập nhật</button>
        </form>
    </div>
@stop	