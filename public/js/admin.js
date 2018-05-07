const ADMIN = {};
ADMIN.POST = {};

ADMIN.init = function () {
    this.bindUIAction();
};

ADMIN.bindUIAction = function () {
    this.bindCategoryDataTable();
    this.bindUserDataTable();
    this.bindPostDataTable();
};

ADMIN.bindCategoryDataTable = function () {
    $(document).ready(function () {
        $('#category-dt').DataTable({
            'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, 'All']],
        });
    });
};

ADMIN.bindUserDataTable = function () {
    $(document).ready(function () {
        $('#user-dt').DataTable({
            'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, 'All']],
        });
    });
};

ADMIN.bindPostDataTable = function () {
    $(document).ready(function () {
        $('#post-dt').DataTable({
            'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, 'All']],
        });
    });
};

ADMIN.POST.bindUIAction = function () {

};

ADMIN.confirmAndDelete = function (id) {
    let caller = $(`#${id}`);
    let message = caller.attr('data-message');
    let confirm_func = caller.attr('data-function');
    let modal = $('#modal-default');

    modal
        .find('.modal-body')
        .find('p')
        .html(message);
    modal
        .find('.modal-confirmed')
        .attr('onclick', confirm_func);
};

ADMIN.POST.delete = function (id) {
    console.log('delete', id);
};

$(function () {
    ADMIN.init();
});
