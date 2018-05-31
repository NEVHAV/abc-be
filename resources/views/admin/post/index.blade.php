@extends('layouts.admin')

@section('title', 'Post')

@section('content_header')
    <div class="user-header u-flex">
        <h1 class="u-flex1">Quản lý bài viết</h1>
        <a class="btn btn-success btn-large a-add-post inline u-marginLeft35 u-fontSize20 u-height44"
           href="/admin/posts/create">
            <i class="fa fa-plus u-marginRight5"></i>
            Tạo bài viết
        </a>
    </div>
@stop

@section('content-inner')
    <div class="user-container">
        <table id="post-dt" class="display" style="width:100%">
            <thead>
            <tr>
                <th>Tên</th>
                <th>Trạng thái</th>
                <th>Category</th>
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
                    <td>
                        <a href="/admin/posts/{{ $post->id }}/edit">
                            {{ $post->title }}
                        </a>
                    </td>
                    <td>{{ $post->state  == 0 ? 'Bản nháp' : ($post->state == 1 ? 'Công khai' : 'Lưu trữ') }}</td>
                    <td>{{ $post->cate->name_vn }}</td>
                    <td>{{ $post->sub->name_vn }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->published_date }}</td>
                    <td>{{ $post->language == 'vn' ? 'Tiếng Việt' : 'Tiếng Nhật'  }}</td>
                    <td>
                        <a class="btn btn-warning btn-xs btn-detail"
                           href="/admin/posts/{{ $post->id }}/edit">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                        <button class="btn btn-danger btn-xs btn-delete"
                                data-toggle="modal"
                                data-target="#modal-default"
                                data-message="Bạn muốn xóa bài viết <b>{{ $post->title }}</b>?"
                                id="{{ $post->id }}"
                                data-function="ADMIN.POST.delete({{ $post->id }})"
                                onclick="ADMIN.confirmAndDelete({{ $post->id }})">
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
                <td>Category</td>
                <th>Sub category</th>
                <th>Tác giả</th>
                <th>Ngày đăng</th>
                <th>Ngôn ngữ</th>
                <th>Hành động</th>
            </tr>
            </tfoot>
        </table>
    </div>
@stop
