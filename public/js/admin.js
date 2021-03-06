const ADMIN = {};
ADMIN.POST = {};
ADMIN.CATEGORY = {};
ADMIN.SUBCATEGORY = {};
ADMIN.ADVERTISEMENT = {};
ADMIN.USER = {};
ADMIN.INFO = {};

ADMIN.init = function () {
  this.bindUIAction();
};

ADMIN.bindUIAction = function () {
  this.bindCategoryDataTable();
  this.bindSubCategoryDataTable();
  this.bindUserDataTable();
  this.bindPostDataTable();
  this.bindAdvertisementDataTable();
  this.bindFileUpload();
  this.bindInfoDataTable();

  this.POST.bindUIAction();
  this.btnGroupInput();

  $('.select2').select2();

  $('.datepicker').datepicker({
    format: 'dd/mm/yyyy',
  });

  $('.timepicker').timepicker({
    minuteStep: 1,
    showSeconds: true,
    showMeridian: false,
    defaultTime: '0:00:00',
  });
};

ADMIN.bindCategoryDataTable = function () {
  $(document).ready(function () {
    $('#category-dt').DataTable({
      'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, 'All']],
    });
  });
};

ADMIN.bindSubCategoryDataTable = function () {
  $(document).ready(function () {
    $('#subcategory-dt').DataTable({
      'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, 'All']],
    });
  });
};

ADMIN.bindAdvertisementDataTable = function () {
  $(document).ready(function () {
    $('#advertisement-dt').DataTable({
      'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, 'All']],
    });
  });
};

ADMIN.bindInfoDataTable = function () {
  $(document).ready(function () {
    $('#info-dt').DataTable({
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
    toolbar: {
      buttons: [
        'bold',
        'italic',
        'underline',
        'anchor',
        'h1',
        'h2',
        'h3',
        'quote',
        'justifyLeft',
        'justifyCenter',
        'justifyRight',
        'justifyFull',
        'orderedlist',
        'unorderedlist',
        'table',
        'removeFormat',
      ],
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
    extensions: {
      table: new MediumEditorTable(),
    },
  });

  $('#post-editor').mediumInsert({
    editor: postEditor,
    addons: {
      images: {
        fileUploadOptions: {
          url: '/admin/api/uploadimage/post',
          dataType: 'json',
        },
      },
    },
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
    let date = `${(now.getDate() < 10 ? '0' : '') + now.getDate()}/${(now.getMonth() + 1 < 10 ? '0' : '') + (now.getMonth() + 1)}/${now.getFullYear()}`;
    let time = `${(now.getHours() < 10 ? '0' : '') + now.getHours()}:${(now.getMinutes() < 10 ? '0' : '') + now.getMinutes()}:${(now.getSeconds() < 10 ? '0' : '') + now.getSeconds()}`;

    $('.datepicker').val(date);
    $('.timepicker').val(time);
  });

  $('#button-publish').on('click', function () {
    $('#inputPublishedDate').prop('required', true);
    $('#inputPublishedTime').prop('required', true);
  });

  $('.button-no-publish').on('click', function () {
    $('#inputPublishedDate').prop('required', false);
    $('#inputPublishedTime').prop('required', false);
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

ADMIN.INFO.delete = function (id) {
  let url = '/admin/company-info/' + id;
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

ADMIN.CATEGORY.delete = function (id) {
  let url = '/admin/categories/' + id;
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

ADMIN.SUBCATEGORY.delete = function (id) {
  let url = '/admin/subcategories/' + id;
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

ADMIN.ADVERTISEMENT.delete = function (id) {
  let url = '/admin/advertisements/' + id;
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

ADMIN.USER.delete = function (id) {
  let url = '/admin/users/' + id;
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
  let fileUploads = $('.fileupload');

  fileUploads.each(function () {
    let fileupload = $(this);

    let removeBtn = $(fileupload.attr('data-delete-button'));
    let preview = $(fileupload.attr('data-preview'));
    // let name = $('#cover-name');
    let targetInput = $(fileupload.attr('data-target'));

    let url = fileupload.attr('data-upload-url');

    fileupload.fileupload({
      type: 'POST',
      url: url,
      autoUpload: true,
      done: function (e, data) {
        let result = data.result;
        if (result.files && result.files[0]) {
          targetInput.val(result.files[0].url);
          removeBtn.attr('data-delete-url', result.files[0].delete_url);
          fileupload.prop('disabled', true);
        }
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
            // name.text(data.files[0].name);
            removeBtn.removeClass('hidden');
          };
          reader.readAsDataURL(data.files[0]);

          data.submit();
        }
      },
    });

    removeBtn.on('click', () => {
      preview.addClass('hidden');
      // name.text('');
      removeBtn.addClass('hidden');
      targetInput.val('');
      fileupload.prop('disabled', false);

      $.ajax({
        url: removeBtn.attr('data-delete-url'),
        type: 'delete',
      }).done(data => {
        removeBtn.attr('data-delete-url', '');
      });
    });
  });
};

ADMIN.uploadImage = function () {

};

$(function () {
  ADMIN.init();
});
