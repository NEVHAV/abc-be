@extends('layouts.admin')

@section('title', 'Đổi mật khẩu')

@section('content_header')
    <h1>Đổi mật khẩu</h1>
@stop

@section('content-inner')
    <div class="u-maxWidth450 u-marginAuto u-marginTop30">
        <form action="/admin/settings/{{$user->id}}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label for="name">Tên người dùng</label>
                <input type="text" class="form-control" id="name" name=
                "name" value="{{$user->name}}" disabled="true">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}" disabled="true">
            </div>
            <div class="form-group">
                <label for="oldPass">Nhập mật khẩu cũ</label>
                <input type="password" class="form-control" id="oldPass" name="oldPass" required="true">
            </div>
             <div class="form-group">
                <label for="newPass1">Nhập mật khẩu mới</label>
                <input type="password" class="form-control" id="newPass1" name="newPass1" required="true">
            </div>
             <div class="form-group">
                <label for="newPass2">Nhập lại mật khẩu mới</label>
                <input type="password" class="form-control" id="newPass2" name="newPass2" required="true">
            </div>
            <button type="submit" class="btn btn-primary btn-block pull-right">Lưu cập nhật</button>
        </form>
    </div>
@stop	