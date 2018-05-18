@extends('layouts.admin')

@section('title', 'Advertisements')

@section('content_header')
    <div class="user-header u-flex">
        <h1 class="u-flex1">Quản lý quảng cáo </h1>
        <a class="btn btn-success btn-large a-add-post inline u-marginLeft35 u-fontSize20 u-height44"
           href="/admin/advertisements/create">
            <i class="fa fa-plus u-marginRight5"></i>
            Tạo quảng cáo
        </a>
    </div>
@stop

@section('content-inner')
    <div class="user-container">
        <table id="advertisement-dt" class="display" style="width:100%">
            <thead>
            <tr>
                <th>STT</th>
                <th>Url tiếng Việt</th>
                <th>Url tiếng Nhật</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($advertisements as $advertisement)
                <tr>
                    <td>
                        <a href="/admin/advertisements/{{ $advertisement->id }}/edit">
                            {{ $advertisement->id }}
                        </a>
                    </td>
                    <td>
                        <a href="/admin/advertisements/{{ $advertisement->id }}/edit">
                            {{ $advertisement->url_vn }}
                        </a>
                    </td>
                    <td>
                        <a href="/admin/advertisements/{{ $advertisement->id }}/edit">
                            {{ $advertisement->url_jp }}
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-warning btn-xs btn-detail"
                           href="/admin/advertisements/{{ $advertisement->id }}/edit">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                        <button class="btn btn-danger btn-xs btn-delete"
                                data-toggle="modal"
                                data-target="#modal-default"
                                data-message="Bạn muốn xóa quảng cáo <b>{{ $advertisement->url_vn }}</b>?"
                                id="{{ $advertisement->id }}"
                                data-function="ADMIN.ADVERTISEMENT.delete({{ $advertisement->id }})"
                                onclick="ADMIN.confirmAndDelete({{ $advertisement->id }})">
                            <span class="glyphicon glyphicon-trash"></span>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>STT</th>
                <th>Url tiếng Việt</th>
                <th>Url tiếng Nhật</th>
                <th>Hành động</th>
            </tr>
            </tfoot>
        </table>
    </div>
@stop
