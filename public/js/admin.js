const ADMIN = {};

ADMIN.init = function () {
    this.bindUIAction();
};

ADMIN.bindUIAction = function () {
    this.bindCategoryDataTable();
    this.bindUserDataTable();
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

$(function () {
    ADMIN.init();
});
