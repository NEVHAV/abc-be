const ADMIN = {};

ADMIN.init = function () {
    this.bindUIAction();
};

ADMIN.bindUIAction = function () {
    this.bindCategoryDataTable();
    this.bindUserDataTable();
    this.bindPostDataTable();
};

ADMIN.bindCategoryDataTable = function () {
    $(document).ready(function() {
        $('#category-dt').DataTable( {
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        } );
    } );
};

ADMIN.bindUserDataTable = function () {
    $(document).ready(function() {
        $('#user-dt').DataTable( {
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        } );
    } );
};

ADMIN.bindPostDataTable = function () {
    $(document).ready(function() {
        $('#post-dt').DataTable( {
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        } );
    } );
};

$(function () {
    ADMIN.init();
});
