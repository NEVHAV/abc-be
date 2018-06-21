@extends('layouts.admin')

@section('title', 'Show category')

@section('content_header')
    <div class="user-header u-flex">
        <h1 class="u-flex1">Thông tin category</h1>
        <a class="btn btn-success btn-large a-add-post inline u-marginLeft35 u-fontSize20 u-height44"
           href="/admin/categories/{{ $category->id }}/edit">
            <i class="fa fa-plus u-marginRight5"></i>
            Chỉnh sửa category
        </a>
    </div>
@stop

@section('content')
    <div class="user-container">
        <div>Tên tiếng Việt: {{ $category->name_vn }}</div>
        <div>Tên tiếng Nhật: {{ $category->name_jp }}</div>
        <div>Bài được ghim tiếng Việt:
            @if($pin_vn)
                <span>
                    <a href="/admin/posts/{{ $pin_vn->id }}/edit" target="_blank">{{ $pin_vn->title }}</a>
                    <form action="/admin/categories/{{$category->id}}/unpinpost" method="post" class="inline">
                        {{ csrf_field() }}
                        <input type="hidden" name="postId" value="{{$pin_vn->id}}">
                        <button type="submit" class="btn btn-flat btn-warning btn-sm">
                            Bỏ ghim tiếng Việt
                        </button>
                    </form>
                </span>
            @else
                Chưa có bài viết tiếng Việt được ghim
            @endif
        </div>
        <div>Bài được ghim tiếng Nhật:
            @if($pin_jp)
                <span>
                    <a href="/admin/posts/{{ $pin_jp->id }}/edit" target="_blank">{{ $pin_jp->title }}</a>
                    <form action="/admin/categories/{{$category->id}}/unpinpostjp" method="post" class="inline">
                        {{ csrf_field() }}
                        <input type="hidden" name="postId" value="{{$pin_jp->id}}">
                        <button type="submit" class="btn btn-flat btn-warning btn-sm">
                            Bỏ ghim tiếng Nhật
                        </button>
                    </form>
                </span>
            @else
                Chưa có bài viết tiếng Nhật được ghim
            @endif
        </div>

        <h1 class="u-flex1">Các bài đăng trong category</h1>
        <div class="user-container">
            <table id="subcategory-dt" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên bài đăng</th>
                    <th>Người đăng</th>
                    <th>Ngày đăng</th>
                    <th>Ghim bài viết tiếng Việt</th>
                    <th>Ghim bài viết tiếng Nhật</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>
                            <a href="/admin/posts/{{ $post->id }}/edit">
                                {{ $post->id }}
                            </a>
                        </td>
                        <td>
                            <a href="/admin/posts/{{ $post->id }}/edit">
                                {{ $post->title }}
                            </a>
                        </td>
                        <td>
                            <a href="/admin/posts/{{ $post->id }}/edit">
                                {{ $user }}
                            </a>
                        </td>
                        <td>
                            <a href="/admin/posts/{{ $post->id }}/edit">
                                {{ $post->published_date }}
                            </a>
                        </td>
                        <td> @if($post->id == $category->pin_vn)
                            <form action="/admin/categories/{{$category->id}}/unpinpost" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="postId" value="{{$post->id}}">
                                <button type="submit" class="btn btn-flat btn-warning">
                                    Bỏ ghim tiếng Việt
                                </button>
                            </form>
                        @else
                            <form action="/admin/categories/{{$category->id}}/pinpost" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="postId" value="{{$post->id}}">
                                <button type="submit" class="btn btn-flat btn-success">
                                    Ghim tiếng Việt
                                </button>
                            </form>
                        @endif
                        </td>
                        <td>
                        @if($post->id == $category->pin_jp)
                            <form action="/admin/categories/{{$category->id}}/unpinpostjp" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="postId" value="{{$post->id}}">
                                <button type="submit" class="btn btn-flat btn-warning">
                                    Bỏ ghim tiếng Nhật
                                </button>
                            </form>
                        @else
                            <form action="/admin/categories/{{$category->id}}/pinpostjp" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="postId" value="{{$post->id}}">
                                <button type="submit" class="btn btn-flat btn-success">
                                    Ghim tiếng Nhật
                                </button>
                            </form>
                        @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Tên bài đăng</th>
                    <th>Người đăng</th>
                    <th>Ngày đăng</th>
                    <th>Ghim bài viết tiếng Việt</th>
                    <th>Ghim bài viết tiếng Nhật</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@stop
