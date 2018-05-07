const ADMIN = {};
ADMIN.POST = {};

ADMIN.init = function () {
    this.bindUIAction();
};

ADMIN.bindUIAction = function () {
    this.bindCategoryDataTable();
    this.bindUserDataTable();
    this.bindPostDataTable();

    this.POST.bindUIAction();
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
    let postEditor = new MediumEditor('#post-editor', {
        placeholder: {
            /* This example includes the default options for placeholder,
               if nothing is passed this is what it used */
            text: 'Type your text',
            hideOnClick: true,
        },
        keyboardCommands: {
            /* This example includes the default options for keyboardCommands,
               if nothing is passed this is what it used */
            commands: [
                {
                    command: 'bold',
                    key: 'B',
                    meta: true,
                    shift: false,
                    alt: false,
                },
                {
                    command: 'italic',
                    key: 'I',
                    meta: true,
                    shift: false,
                    alt: false,
                },
                {
                    command: 'underline',
                    key: 'U',
                    meta: true,
                    shift: false,
                    alt: false,
                },
            ],
        },
        autoLink: true,
    });

    $('#post-editor').mediumInsert({
        editor: postEditor,
    });

    $('.select2').select2();

    $('.datepicker').datepicker();

    $('.timepicker').timepicker();
};

ADMIN.confirmAndDelete = function (id) {
    let caller = $(`#${id}`);
    let message = caller.attr('data-message');
    let confirmFunc = caller.attr('data-function');
    let modal = $('#modal-default');

    modal
        .find('.modal-body')
        .find('p')
        .html(message);
    modal
        .find('.modal-confirmed')
        .attr('onclick', confirmFunc);
};

ADMIN.POST.delete = function (id) {
    console.log('delete', id);
};

$(function () {
    ADMIN.init();
});
