@extends('layouts.admin')

@section('title', 'Tạo info')

@section('content_header')
    <h1>Tạo thông tin</h1>
@stop

@section('content-inner')

        <div class="u-maxWidth450 u-marginAuto u-marginTop30">
            <form action="/admin/company-info" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="company_name_vn">Tên tiếng Việt</label>
                    <input type="text" class="form-control" id="company_name_vn" name="company_name_vn" required="true">
                </div>
                <div class="form-group">
                    <label for="company_name_jp">Tên tiếng Nhật</label>
                    <input type="text" class="form-control" id="company_name_jp" name="company_name_jp">
                </div>
                <div class="form-group">
                    <label for="phone_number">Số điện thoại</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" required="true">
                </div>
                <div class="form-group">
                    <label for="hotline">Hotline</label>
                    <input type="text" class="form-control" id="hotline" name="hotline" required="true">
                </div>
                <div class="form-group">
                    <label for="logo_url">Link logo</label>
                    <input type="text" class="form-control" id="logo_url" name="logo_url" required="true">
                </div>
                <div class="form-group">
                    <label for="company_slogan_vn">Slogan tiếng Việt</label>
                    <input type="text" class="form-control" id="company_slogan_vn" name="company_slogan_vn" required="true">
                </div>
                <div class="form-group">
                    <label for="company_slogan_jp">Slogan tiếng Nhật</label>
                    <input type="text" class="form-control" id="company_slogan_jp" name="company_slogan_jp">
                </div>
                <div class="form-group">
                    <label for="post-editor" class="control-label">Footer tiếng Việt</label>
                    <div>
                        <textarea id="post-editor" class="editable post-content u-padding5" name="footer_vn" required="true"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="post-editor" class="control-label">Footer tiếng Nhật</label>
                    <div>
                        <textarea id="post-editor" class="editable post-content u-padding5" name="footer_jp"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="supporter_name">Tên người hỗ trợ</label>
                    <input type="text" class="form-control" id="supporter_name" name="supporter_name" required="true">
                </div>
                <div class="form-group">
                    <label for="supporter_phone_number">SDT người hỗ trợ</label>
                    <input type="text" class="form-control" id="supporter_phone_number" name="supporter_phone_number" required="true">
                </div>
                <div class="form-group">
                    <label for="supporter_email">Email người hỗ trợ</label>
                    <input type="text" class="form-control" id="supporter_email" name="supporter_email" required="true">
                </div>
                <div class="box-footer u-backgroundTransparentBlackLightest u-marginBottom50">
                    <input type="submit" class="btn btn-success pull-right btn-block" value="Tạo thông tin">
                </div>
            </form>
        </div>
@stop
