@extends('layouts.admin')

@section('title', 'Add category')

@section('content_header')
    <h1>Create category</h1>
@stop

@section('content-inner')
    <div class="u-maxWidth740 u-marginAuto u-marginTop30">
        <form action="/admin/posts" method="post"
              class="form-horizontal">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="inputTitle" class="col-sm-2 control-label">Ten</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputTitle" name="title">
                </div>
            </div>

            <div class="form-group">
                <label for="inputState" class="col-sm-2 control-label">State</label>
                <input type="number" hidden id="inputState" name="state">
                <div class="col-sm-10">
                    <div class="btn-group-toggle" id="btn-group-inputState">
                        <button type="button" class="btn btn-flat btn-border active">Ban nhap</button>
                        <button type="button" class="btn btn-flat btn-border">Da dang</button>
                        <button type="button" class="btn btn-flat btn-border">Luu tru</button>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPublishedDate" class="col-sm-2 control-label">Ngay dang</label>
                <div class="col-sm-4">
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right datepicker">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                        </div>
                        <input type="text" class="form-control timepicker">
                    </div>
                </div>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-flat btn-default btn-block">Now</button>
                </div>
            </div>

            <div class="form-group">
                <label for="inputCover" class="col-sm-2 control-label">Cover</label>
                <div class="col-sm-10">
                    <button type="button" class="btn btn-flat btn-default">Upload Image</button>
                </div>
            </div>

            <div class="form-group">
                <label for="inputContent" class="col-sm-2 control-label">Noi dung</label>
                <div class="col-sm-10">
                    <div id="post-editor" class="editable post-content"></div>
                </div>
                <textarea name="content" id="inputContent" hidden></textarea>
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
                <label for="inputLanguage" class="col-sm-2 control-label">Ngon ngu</label>
                <input type="text" hidden id="inputState" name="language">
                <div class="col-sm-10">
                    <div class="btn-group-toggle" id="btn-group-inputLanguage">
                        <button type="button" class="btn btn-flat btn-border active">Tieng Viet</button>
                        <button type="button" class="btn btn-flat btn-border">Tieng Nhat</button>
                    </div>
                </div>
            </div>

            <div class="box-footer u-backgroundTransparentBlackLightest u-marginBottom50">
                <input type="submit" class="btn btn-success pull-right u-minWidth80" value="Luu">
            </div>
        </form>
    </div>
@stop
