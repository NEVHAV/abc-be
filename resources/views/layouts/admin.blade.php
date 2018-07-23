@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="/css/jquery.fileupload.css">
    <link rel="stylesheet" href="/css/small-medium.css">
    <link rel="stylesheet" href="/css/medium-editor/medium-editor.min.css">
    <link rel="stylesheet" href="/css/medium-editor/themes/default.css">
    <link rel="stylesheet" href="/css/medium-editor-insert-plugin.min.css">
    <link rel="stylesheet" href="/css/medium-editor-tables.css">
    <link rel="stylesheet" href="/css/select2.min.css">
    <link rel="stylesheet" href="/css/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="/css/editor.css">
    <link rel="stylesheet" href="/css/admin.css">
    <link href="{{ asset('css/chat.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

@stop

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif
    <div class="content-inner">
        @yield('content-inner')
    </div>
    <div class="modal fade" id="modal-default" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Cảnh báo</h4>
                </div>
                <div class="modal-body">
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-default pull-left"
                            data-dismiss="modal">
                        Hủy bỏ
                    </button>
                    <button type="button"
                            class="btn btn-primary modal-confirmed"
                            data-dismiss="modal">
                        Đồng ý
                    </button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@stop

@section('js')
    <script src="/js/jquery.js"></script>
    <script src="/js/handlebars.runtime.min.js"></script>
    <script src="/js/jquery-sortable-min.js"></script>
    <script src="/js/jquery.ui.widget.js"></script>
    <script src="/js/jquery.iframe-transport.min.js"></script>
    <script src="/js/load-image.all.min.js"></script>
    <script src="/js/canvas-to-blob.min.js"></script>
    <script src="/js/jquery.fileupload.min.js"></script>
    <script src="/js/jquery.fileupload-process.min.js"></script>
    <script src="/js/jquery.fileupload-image.js"></script>
    <script src="/js/jquery.dataTables.min.js"></script>
    <script src="/js/select2.min.js"></script>
    <script src="/js/bootstrap-timepicker.min.js"></script>
    <script src="/js/bootstrap-datepicker.min.js"></script>
    <script src="/js/medium-editor.min.js"></script>
    <script src="/js/medium-editor-insert-plugin.min.js"></script>
    <script type="text/javascript" src="/js/medium-editor-tables.js"></script>
    <script src="/js/admin.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.2.0/firebase.js"></script>
    <script type="text/javascript" src="{{ asset('js/chat.js') }}"></script>
    
@stop

