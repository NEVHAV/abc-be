@extends('layouts.admin')

@section('title', 'Tạo quảng cáo ')

@section('content_header')
    <h1>Tạo quảng cáo </h1>
@stop

@section('content-inner')
    <div class="u-maxWidth450 u-marginAuto u-marginTop30">
        <form action="/admin/advertisements" method="post" class="form-horizontal">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="url_vn" class="control-label col-sm-3">Url tiếng Việt</label>
                <input type="hidden" class="form-control" id="url_vn" name=
                "url_vn" required="true">
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
                                    class="btn btn-warning btn-flat hidden">
                                Hủy bỏ
                            </button>
                        </div>
                    </div>
                    <div class="u-marginTop10">
                        <img src="#" id="cover-preview-vn" class="hidden" height="80">
                        <p id="cover-name"></p>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="url_jp" class="control-label col-sm-3">Url tiếng Nhật</label>
                <input type="hidden" class="form-control" id="url_jp" name="url_jp">
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
                                       data-preview="#cover-preview-jp">
                            </span>
                            <button type="button"
                                    id="cover-remove-jp"
                                    class="btn btn-warning btn-flat hidden">
                                Hủy bỏ
                            </button>
                        </div>
                    </div>
                    <div class="u-marginTop10">
                        <img src="#" id="cover-preview-jp" class="hidden" height="80">
                        <p id="cover-name"></p>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block pull-right">Tạo quảng cáo</button>
        </form>
    </div>
@stop
