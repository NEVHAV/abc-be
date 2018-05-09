@extends('layouts.admin')

@section('title', 'Chỉnh sửa category')

@section('content_header')
    <h1>Chỉnh sửa category</h1>
@stop

@section('content')
    <div class="u-maxWidth450 u-marginAuto u-marginTop30">
        <form action="/admin/subcategories/{{$subcategory->id}}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label for="name_vn">Tên tiếng Việt</label>
                <input type="text" class="form-control" id="name_vn" name=
                "name_vn" value="{{$subcategory->name_vn}}" required="true">
            </div>
            <div class="form-group">
                <label for="name_jp">Tên tiếng Nhật</label>
                <input type="text" class="form-control" id="name_jp" name="name_jp" value="{{$subcategory->name_jp}}">
            </div>
            <div class="form-group">
                <label for="category">Tên category</label>
                <select id="inputIDCate"
                        class="select2 u-sizeFullWidth"
                        name="id_cate">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                                {{ $category->id == $subcategory->id_cate ? 'selected="selected"' : '' }}>
                            {{ $category->name_vn }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block pull-right">Lưu cập nhật</button>
        </form>
    </div>
@stop	