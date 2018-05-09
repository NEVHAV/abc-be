@extends('layouts.admin')

@section('title', 'Tạo sub category')

@section('content_header')
    <h1>Tạo sub category</h1>
@stop

@section('content')
<div>
	<form action = "/admin/subcategories" method = "post">
		{{ csrf_field() }}
	  <div class="form-group">
	    <label for="name_vn">Tên tiếng Việt</label>
	    <input type="text" class="form-control" id="name_vn" name=
	    "name_vn">
	  </div>
	  <div class="form-group">
	    <label for="name_jp">Tên tiếng Nhật</label>
	    <input type="text" class="form-control" id="name_jp" name ="name_jp">
	  </div>
	  <div class="form-group">
	  	<label for="category">Tên category</label>
	  	<select id="inputIDCate"
            class="select2 u-sizeFullWidth"
            name="id_cate">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name_vn }}</option>
            @endforeach
        </select>
	  </div>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
@stop
