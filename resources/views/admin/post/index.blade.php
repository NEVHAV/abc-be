@extends('layouts.admin')

@section('title', 'Pots')

@section('content_header')
    <h1>Post</h1>
@stop

@section('content')
    <table id="post-dt" class="display" style="width:100%">
        <thead>
        <tr>
            <th>Tên</th>
            <th>Trạng thái</th>
            <th>Sub category</th>
            <th>Tác giả</th>
            <th>Ngày đăng</th>
            <th>Ngôn ngữ</th>
            <th>Hành động</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->state  == 0 ? 'Bản nháp' : ($post->state == 1 ? 'Đã đăng' : 'Lưu trữ') }}</td>
                <td>{{ $post->sub->name_vn }}</td>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->published_date }}</td>
                <td>{{ $post->language == 'vi' ? 'Tiếng Việt' : 'Tiếng Nhật'  }}</td>
                <td>
                    <button class="btn btn-warning btn-xs btn-detail"
                            ng-click="toggle('edit', category.id_cate)">
                        <span class="glyphicon glyphicon-edit"></span>
                    </button>
                    <button class="btn btn-danger btn-xs btn-delete"
                            ng-click="confirmDelete(category.id_cate)">
                        <span class="glyphicon glyphicon-trash"></span>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>Tên</th>
            <th>Trạng thái</th>
            <th>Sub category</th>
            <th>Tác giả</th>
            <th>Ngày đăng</th>
            <th>Ngôn ngữ</th>
            <th>Hành động</th>
        </tr>
        </tfoot>
    </table>
@stop
