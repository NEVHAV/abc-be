@extends('layouts.admin')

@section('title', 'Tạo bài viết')

@section('content_header')
    <h1>Tạo bài viết</h1>
@stop

@section('content-inner')
    <div class="u-maxWidth740 u-marginAuto u-marginTop30">
        <form action="/admin/posts" method="post"
              class="form-horizontal">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="inputTitle" class="col-sm-2 control-label">Tiêu đề</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputTitle" name="title">
                </div>
            </div>

            <div class="form-group">
                <label for="inputState" class="col-sm-2 control-label">Trạng thái</label>
                <input type="number" hidden id="inputState" name="state">
                <div class="col-sm-10">
                    <div class="btn-group-toggle btn-group-with-input">
                        <button type="button"
                                class="btn btn-flat btn-border active"
                                data-target="#inputState"
                                value="0">
                            Bản nháp
                        </button>
                        <button type="button"
                                class="btn btn-flat btn-border"
                                data-target="#inputState"
                                value="1">
                            Công khai
                        </button>
                        <button type="button"
                                class="btn btn-flat btn-border"
                                data-target="#inputState"
                                value="2">
                            Lưu trữ
                        </button>
                    </div>
                </div>
            </div>

            <div class="form-group hidden" id="publised-date">
                <label for="inputPublishedDate" class="col-sm-2 control-label">Ngày đăng</label>
                <div class="col-sm-4">
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="published_date[date]" id="inputPublishedDate"
                               class="form-control pull-right datepicker">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                        </div>
                        <input type="text" name="published_date[time]" class="form-control timepicker">
                    </div>
                </div>
                <div class="col-sm-2">
                    <button type="button" id="btn-now" class="btn btn-flat btn-info btn-block">Hiện tại</button>
                </div>
            </div>

            <div class="form-group">
                <label for="inputCover" class="col-sm-2 control-label">Cover</label>
                <div class="col-sm-10">
                    <input type="hidden" name="cover" id="inputCover">

                    <div class="fileupload-buttonbar">
                        <div class="">
                            <!-- The fileinput-button span is used to style the file input field as button -->
                            <span class="btn btn-default btn-flat fileinput-button">
                                <i class="glyphicon glyphicon-plus"></i>
                                <span>Upload cover</span>
                                <input type="file" name="image" id="fileupload">
                            </span>
                            <button type="button"
                                    id="cover-remove"
                                    class="btn btn-warning btn-flat hidden">
                                Hủy bỏ
                            </button>
                        </div>
                    </div>
                    <div class="u-marginTop10">
                        <img src="#" id="cover-preview" class="hidden" height="80">
                        <p id="cover-name"></p>
                    </div>

                </div>
            </div>

            <div class="form-group">
                <label for="post-editor" class="col-sm-2 control-label">Nội dung</label>
                <div class="col-sm-10">
                    <textarea id="post-editor" class="editable post-content" name="content"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="inputIDSub" class="col-sm-2 control-label">Sub Category</label>
                <div class="col-sm-10">
                    <select id="inputIDSub"
                            class="select2 u-sizeFullWidth"
                            name="id_sub">
                        @foreach($sub_categories as $sub_category)
                            <option value="{{ $sub_category->id }}">{{ $sub_category->name_vn }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="inputLanguage" class="col-sm-2 control-label">Ngôn ngữ</label>
                <input type="text" hidden id="inputLanguage" name="language" value="vn">
                <div class="col-sm-10">
                    <div class="btn-group-toggle btn-group-with-input">
                        <button type="button"
                                class="btn btn-flat btn-border active"
                                data-target="#inputLanguage"
                                value="vn">
                            Tiếng Việt
                        </button>
                        <button type="button"
                                class="btn btn-flat btn-border"
                                data-target="#inputLanguage"
                                value="jp">
                            Tiếng Nhật
                        </button>
                    </div>
                </div>
            </div>

            <div class="box-footer u-backgroundTransparentBlackLightest u-marginBottom50">
                <input type="submit" class="btn btn-success pull-right u-minWidth80" value="Lưu bài viết">
            </div>
        </form>
    </div>
@stop
