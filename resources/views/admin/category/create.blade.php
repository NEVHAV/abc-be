@extends('layouts.admin')

@section('title', 'Add category')

@section('content_header')
    <h1>Add category</h1>
@stop

@section('content')
<div>
	<form action = "/admin/categories" method = "post">
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
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
@stop
