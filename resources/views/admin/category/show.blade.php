@extends('layouts.admin')

@section('title', 'Show category')

@section('content_header')
    <div class="user-header u-flex">
        <h1 class="u-flex1">Thông tin category</h1>
        <a class="btn btn-success btn-large a-add-post inline u-marginLeft35 u-fontSize20 u-height44"
           href="/admin/categories/{{ $category->id }}/edit">
            <i class="fa fa-plus u-marginRight5"></i>
            Chỉnh sửa category
        </a>
     </div>
@stop

@section('content')
     <div class="user-container">
        <table id="category-dt" class="display" style="width:100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên tiếng Việt</th>
            <th>Tên tiếng Nhật</th>
        </tr>
        </thead>
        <tbody>
        	 <tr>
        	 	<td>
        	 		<a href="/admin/categories/{{ $category->id }}/edit">
                        {{ $category->id }}
                    </a>
        	 	</td>
        	 	<td>
                    <a href="/admin/categories/{{ $category->id }}/edit">
                         {{ $category->name_vn }}
                    </a>
                </td>
                <td>
                    <a href="/admin/categories/{{ $category->id }}/edit">
                         {{ $category->name_jp }}
                    </a>
                </td>
             </tr>
        </tbody>
        <tfoot>
        <tr>
            <th>ID</th>
            <th>Tên tiếng Việt</th>
            <th>Tên tiếng Nhật</th>
        </tr>
        </tfoot>
    </table>

<h1 class="u-flex1">Các bài đăng trong sub category</h1>
    <div class="user-container">
        <table id="subcategory-dt" class="display" style="width:100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên bài đăng</th>
            <th>Người đăng</th>
            <th>Ngày đăng</th>
        </tr>
        </thead>
        <tbody>
        	@foreach($posts as $post)
        	<tr>
        	 	<td>
        	 		<a href="/admin/posts/{{ $post->id }}/edit">
                        {{ $post->id }}
                    </a>
        	 	</td>
        	 	<td>
                    <a href="/admin/posts/{{ $post->id }}/edit">
                         {{ $post->title }}
                    </a>
                </td>
                <td>
                	<a href="/admin/posts/{{ $post->id }}/edit">
                         {{ $user }}
                    </a>
                </td>
                <td>
                    <a href="/admin/posts/{{ $post->id }}/edit">
                         {{ $post->published_date }}                     
                    </a>
                </td>	
        	</tr>
        	@endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>ID</th>r
            <th>Tên bài đăng</th>
            <th>Người đăng</th>
            <th>Ngày đăng</th>
        </tr>
        </tfoot>
    </table>
</div>
@stop
