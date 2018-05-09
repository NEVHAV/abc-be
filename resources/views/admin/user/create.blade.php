@extends('layouts.admin')

@section('title', 'Tạo người dùng')

@section('content_header')
    <h1>Tạo người dùng</h1>
@stop

@section('content-inner')
    <div class="u-maxWidth450 u-marginAuto u-marginTop30">
        <form action="/admin/users" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Tên người dùng</label>
                <input type="text" class="form-control" id="name" name=
                "name" required="true">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" required="true">
            </div>
            <div class="form-group">
                <label for="email">Password</label>
                <input type="password" class="form-control" id="password" name="password" required="true">
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
            <button type="submit" class="btn btn-primary btn-block pull-right">Tạo người dùng</button>
        </form>
    </div>
@stop
