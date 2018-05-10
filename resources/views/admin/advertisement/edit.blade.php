@extends('layouts.admin')

@section('title', 'Chỉnh sửa quảng cáo')

@section('content_header')
    <h1>Chỉnh sửa quảng cáo</h1>
@stop

@section('content-inner')
    <div class="u-maxWidth450 u-marginAuto u-marginTop30">
        <form action="/admin/advertisements/{{$advertisement->id}}" class="form-horizontal" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label for="url_vn" class="control-label col-sm-3">Url tiếng Việt</label>
                <input type="hidden" class="form-control" id="url_vn"
                       name="url_vn" required value="{{ $advertisement->url_vn }}">
                <div class="col-sm-6">
                    <div class="fileupload-buttonbar">
                        <div class="">
                            <!-- The fileinput-button span is used to style the file input field as button -->
                            <span class="btn btn-default btn-flat fileinput-button">
                                <i class="glyphicon glyphicon-plus"></i>
                                <span>Upload ảnh</span>
                                <input type="file"
                                       name="files[]"
                                       class="fileupload"
                                       accept="image/*"
                                       data-target="#url_vn"
                                       data-delete-button="#cover-remove-vn"
                                       data-preview="#cover-preview-vn">
                            </span>
                            <button type="button"
                                    id="cover-remove-vn"
                                    class="btn btn-warning btn-flat"
                                    data-delete-url="{{ $advertisement->url_vn }}">
                                Hủy bỏ
                            </button>
                        </div>
                    </div>
                    <div class="u-marginTop10">
                        <img src="{{ $advertisement->url_vn }}" id="cover-preview-vn" height="80">
                        <p id="cover-name"></p>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="url_jp" class="control-label col-sm-3">Url tiếng Nhật</label>
                <input type="hidden" class="form-control" id="url_jp" name="url_jp"
                       value="{{ $advertisement->url_jp }}">
                <div class="col-sm-6">
                    <div class="fileupload-buttonbar">
                        <div class="">
                            <!-- The fileinput-button span is used to style the file input field as button -->
                            <span class="btn btn-default btn-flat fileinput-button">
                                <i class="glyphicon glyphicon-plus"></i>
                                <span>Upload ảnh</span>
                                <input type="file"
                                       name="files[]"
                                       class="fileupload"
                                       accept="image/*"
                                       data-target="#url_jp"
                                       data-delete-button="#cover-remove-jp"
                                       data-preview="#cover-preview-jp"
                                       value="{{ $advertisement->url_jp }}">
                            </span>
                            <button type="button"
                                    id="cover-remove-jp"
                                    class="btn btn-warning btn-flat"
                                    data-delete-url="{{ $advertisement->url_jp }}">
                                Hủy bỏ
                            </button>
                        </div>
                    </div>
                    <div class="u-marginTop10">
                        <img src="{{ $advertisement->url_jp }}" id="cover-preview-jp" height="80">
                        <p id="cover-name"></p>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block pull-right">Lưu cập nhật</button>
        </form>
    </div>
@stop	