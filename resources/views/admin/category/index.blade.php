        @extends('layouts.admin')

        @section('title', 'Categories')

        @section('content_header')
        <div class="user-header u-flex">
            <h1 class="u-flex1">Quản lý category</h1>
            <a class="btn btn-success btn-large a-add-post inline u-marginLeft35 u-fontSize20 u-height44"
               href="/admin/categories/create">
                <i class="fa fa-plus u-marginRight5"></i>
                Tạo category
            </a>
        </div>
        @stop

        @section('content-inner')
        <div class="user-container">
        <table id="category-dt" class="display" style="width:100%">
        <thead>
        <tr>
            <th>STT</th>
            <th>Tên tiếng Việt</th>
            <th>Tên tiếng Nhật</th>
            <th>Hành động</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>
                    <a href="/admin/categories/{{ $category->id }}">
                        {{ $category->id }}
                    </a>
                </td>
                <td>
                    <a href="/admin/categories/{{ $category->id }}">
                         {{ $category->name_vn }}
                    </a>
                </td>
                <td>
                    <a href="/admin/categories/{{ $category->id }}">
                         {{ $category->name_jp }}
                    </a>
                </td>
                <td>
                    <a class="btn btn-warning btn-xs btn-detail"
                           href="/admin/categories/{{ $category->id }}/edit">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                    <button class="btn btn-danger btn-xs btn-delete"
                                data-toggle="modal"
                                data-target="#modal-default"
                                data-message="Bạn muốn xóa category <b>{{ $category->name_vn }}</b>?"
                                id="{{ $category->id }}"
                                data-function="ADMIN.CATEGORY.delete({{ $category->id }})"
                                onclick="ADMIN.confirmAndDelete({{ $category->id }})">
                            <span class="glyphicon glyphicon-trash"></span>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>Id</th>
            <th>Tên tiếng Việt</th>
            <th>Tên tiếng Nhật</th>
            <th>Hành động</th>
        </tr>
        </tfoot>
    </table>
</div>
    @stop
