        @extends('layouts.admin')

        @section('title', 'Subcategories')

        @section('content_header')
        <div class="user-header u-flex">
            <h1 class="u-flex1">Quản lý sub category</h1>
            <a class="btn btn-success btn-large a-add-post inline u-marginLeft35 u-fontSize20 u-height44"
               href="/admin/subcategories/create">
                <i class="fa fa-plus u-marginRight5"></i>
                Tạo sub category
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
            <th>Tên Category tiếng Việt</th>
            <th>Tên Category tiếng Nhật</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($subcategories as $subcategory)
            <tr>
                <td>
                    <a href="/admin/subcategories/{{ $subcategory->id }}/edit">
                        {{ $subcategory->id }}
                    </a>
                </td>
                <td>
                    <a href="/admin/subcategories/{{ $subcategory->id }}/edit">
                         {{ $subcategory->name_vn }}
                    </a>
                </td>
                <td>
                    <a href="/admin/subcategories/{{ $subcategory->id }}/edit">
                         {{ $subcategory->name_jp }}
                    </a>
                </td>
                <td>
                    <a href="/admin/subcategories/{{ $subcategory->id }}/edit">
                         {{ $subcategory->cate_vn }}
                    </a>
                </td>
                <td>
                    <a href="/admin/subcategories/{{ $subcategory->id }}/edit">
                         {{ $subcategory->cate_jp }}
                    </a>
                </td>
                <td>
                    <a class="btn btn-warning btn-xs btn-detail"
                           href="/admin/subcategories/{{ $subcategory->id }}/edit">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                    <button class="btn btn-danger btn-xs btn-delete"
                                data-toggle="modal"
                                data-target="#modal-default"
                                data-message="Bạn muốn xóa sub sub category<b>{{ $subcategory->name_vn }}</b>?"
                                id="{{ $subcategory->id }}"
                                data-function="ADMIN.SUBCATEGORY.delete({{ $subcategory->id }})"
                                onclick="ADMIN.confirmAndDelete({{ $subcategory->id }})">
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
            <th>Tên Category tiếng Việt</th>
            <th>Tên Category tiếng Nhật</th>
            <th></th>
        </tr>
        </tfoot>
    </table>
</div>
    @stop
