@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="/css/small-medium.css">
    <link rel="stylesheet" href="/css/admin.css">
@stop

@section('content')
    @yield('content-inner')
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
    <script src="/js/jquery.dataTables.min.js"></script>
    <script src="/js/admin.js"></script>
@stop

