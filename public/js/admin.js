const ADMIN = {};
ADMIN.POST = {};

ADMIN.init = function () {
    this.bindUIAction();
};

ADMIN.bindUIAction = function () {
    this.bindCategoryDataTable();
    this.bindUserDataTable();
    this.bindPostDataTable();

    this.bindFileUpload();

    this.POST.bindUIAction();
    this.btnGroupInput();
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
        addons: {
            images: {
                fileUploadOptions: {
                    url: '/admin/api/uploadimage',
                    dataType: 'json',
                },
            },
        },
    });

    $('.select2').select2();

    $('.datepicker').datepicker({
        format: 'd/m/Y',
    });

    $('.timepicker').timepicker({
        minuteStep: 1,
        showSeconds: true,
        showMeridian: false,
        defaultTime: '0:00:00',
    });

    $('button[data-target="#inputState"]').on('click', function () {
        if ($(this).val() !== '1') {
            $('#publised-date').addClass('hidden');
        } else {
            $('#publised-date').removeClass('hidden');
        }
    });

    $('#btn-now').on('click', function () {
        let now = new Date();
        let date = `${now.getDate()}/${now.getMonth() + 1}/${now.getFullYear()}`;
        let time = `${now.getHours()}:${now.getMinutes()}:${now.getSeconds()}`;

        $('.datepicker').val(date);
        $('.timepicker').val(time);
    });
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
    let url = '/admin/posts/' + id;
    $.ajax({
        url: url,
        type: 'delete',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
    }).done((data) => {
        window.location.reload();
    });
};

ADMIN.btnGroupInput = function () {
    let btnGroupInput = $('.btn-group-with-input');
    let buttons = btnGroupInput.find('button');

    buttons.each(function () {
        let button = $(this);
        button.on('click', function () {
            let inputTarget = $(button.attr('data-target'));
            inputTarget.val(button.attr('value'));

            $(`button[data-target="${button.attr('data-target')}"]`).removeClass('active');
            button.addClass('active');
        });
    });
};

ADMIN.bindFileUpload = function () {
    let removeBtn = $('#cover-remove');
    let preview = $('#cover-preview');
    let name = $('#cover-name');

    $('#fileupload').fileupload({
        dataType: 'json',
        url: '/admin/api/uploadimage',
        autoUpload: true,
        done: function (e, data) {
            let result = data.result;
            if (result.files && result.files[0]) {
                $('#inputCover').val(result.files[0].url);
            }
            console.log(result);
        },
        progressall: function (e, data) {
            let progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .bar').css(
                'width',
                progress + '%',
            );
        },
        add: function (e, data) {
            if (data.files && data.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    preview.attr('src', e.target.result);
                    preview.removeClass('hidden');
                    name.text(data.files[0].name);
                    removeBtn.removeClass('hidden');
                };
                reader.readAsDataURL(data.files[0]);

                data.submit();
            }
        },
    });

    removeBtn.on('click', () => {
        preview.addClass('hidden');
        name.text('');
        removeBtn.addClass('hidden');
    });
};

ADMIN.uploadImage = function () {

};

$(function () {
    ADMIN.init();
});
