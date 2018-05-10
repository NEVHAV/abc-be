        @extends('layouts.admin')

        @section('title', 'Thông tin công ty')

        @section('content_header')
        <div class="user-header u-flex">
            <h1 class="u-flex1">Thông tin công ty</h1>
            <a class="btn btn-success btn-large a-add-post inline u-marginLeft35 u-fontSize20 u-height44"
               href="/admin/company-info/create">
                <i class="fa fa-plus u-marginRight5"></i>
                Thêm thông tin
            </a>
        </div>
        @stop

        @section('content-inner')
        <div class="user-container">
        <table id="info-dt" class="display" style="width:100%">
        <thead>
        <tr>
            <th>Tên tiếng Việt</th>
            <th>Tên tiếng Nhật</th>
            <th>Số điện thoại</th> 
            <th>Hotline</th>
            <th>Tên người hỗ trợ</th>
            <th>SDT người hỗ trợ</th>
            <th>Email người hỗ trợ</th>
            <th>Hành động</th>  
        </tr>
        </thead>
        <tbody>
        @foreach($infos as $info)
            <tr>
                <td>
                    <a href="/admin/company-info/{{ $info->id }}/edit">
                        {{ $info->company_name_vn }}
                    </a>
                </td>
                <td>
                    <a href="/admin/company-info/{{ $info->id }}/edit">
                        {{ $info->company_name_jp }}
                    </a>
                </td>
                <td>
                    <a href="/admin/company-info/{{ $info->id }}/edit">
                        {{ $info->phone_number }}
                    </a>
                </td>
                <td>
                    <a href="/admin/company-info/{{ $info->id }}/edit">
                        {{ $info->hotline }}
                    </a>
                </td>
                <td>
                    <a href="/admin/company-info/{{ $info->id }}/edit">
                        {{ $info->supporter_name }}
                    </a>
                </td>
                <td>
                    <a href="/admin/company-info/{{ $info->id }}/edit">
                        {{ $info->supporter_phone_number }}
                    </a>
                </td>
                <td>
                    <a href="/admin/company-info/{{ $info->id }}/edit">
                        {{ $info->supporter_email }}
                    </a>
                </td>
                <td>
                    <a class="btn btn-warning btn-xs btn-detail"
                           href="/admin/company-info/{{ $info->id }}/edit">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                    <button class="btn btn-danger btn-xs btn-delete"
                                data-toggle="modal"
                                data-target="#modal-default"
                                data-message="Bạn muốn xóa Thông tin <b>{{ $info->company_name_vn }}</b>?"
                                id="{{ $info->id }}"
                                data-function="ADMIN.INFO.delete({{ $info->id }})"
                                onclick="ADMIN.confirmAndDelete({{ $info->id }})">
                            <span class="glyphicon glyphicon-trash"></span>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>Tên tiếng Việt</th>
            <th>Tên tiếng Nhật</th>
            <th>Số điện thoại</th> 
            <th>Hotline</th>
            <th>Tên người hỗ trợ</th>
            <th>SDT người hỗ trợ</th>
            <th>Email người hỗ trợ</th>
            <th>Hành động</th>
        </tr>
        </tfoot>
    </table>
</div>
    @stop
