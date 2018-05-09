@extends('layouts.admin')

@section('title', 'Quản lý người dùng')

@section('content_header')
    <div class="user-header u-flex">
        <h1 class="u-flex1">Quản lý người dùng</h1>

        @if($isAdmin)
            <a class="btn btn-success btn-large a-add-post inline u-marginLeft35 u-fontSize20 u-height44"
               href="/admin/users/create">
                <i class="fa fa-plus u-marginRight5"></i>
                Tạo người dùng
            </a>
        @endif
    </div>
@stop

@section('content-inner')
    <div class="user-container">
        <table id="user-dt" class="display" style="width:100%">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tên người dùng</th>
                <th>Email</th>
                <th>Quyền hạn</th>
                @if($isAdmin)
                    <th>Hành động</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>
                        @if($isAdmin)
                            <a href="/admin/users/{{ $user->id }}/edit">
                                {{ $user->id }}
                            </a>
                        @else
                            {{ $user->id }}
                        @endif
                    </td>
                    <td>
                        @if($isAdmin)
                            <a href="/admin/users/{{ $user->id }}/edit">
                                {{ $user->name }}
                            </a>
                        @else
                            {{ $user->name }}
                        @endif
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>

                    <td>
                        {{ $user->mode == 0 ? 'Quản trị viên' : 'Biên tập viên' }}
                    </td>
                    @if($isAdmin)
                        <td>
                            <a class="btn btn-warning btn-xs btn-detail"
                               href="/admin/users/{{ $user->id }}/edit">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            <button class="btn btn-danger btn-xs btn-delete"
                                    data-toggle="modal"
                                    data-target="#modal-default"
                                    data-message="Bạn muốn xóa người dùng <b>{{ $user->name }}</b>?"
                                    id="{{ $user->id }}"
                                    data-function="ADMIN.USER.delete({{ $user->id }})"
                                    onclick="ADMIN.confirmAndDelete({{ $user->id }})">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>STT</th>
                <th>Tên người dùng</th>
                <th>Email</th>
                <th>Quyền hạn</th>
                @if($isAdmin)
                    <th>Hành động</th>
                @endif
            </tr>
            </tfoot>
        </table>
    </div>
@stop
