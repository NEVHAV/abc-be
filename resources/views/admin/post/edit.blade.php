@extends('layouts.admin')

@section('title', 'Edit category')

@section('content_header')
    <h1>Edit category</h1>
@stop

@section('content')
    <form action="/admin/posts" method="post">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

    </form>
@stop
