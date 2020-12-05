/**
 * Created by sourav on 22/03/2017.
 */
$(document).ready(function () {


    $('#accessPermissionsTbl tr').each(function() {
        $(this).find('.permission').on('click', changePermission)
    });

    function changePermission(evt) {
        var row = $(this);
        var status = '';
        if(row.hasClass('active')) {
            status = 'inactive';
        } else {
            status = 'active';
        }
        var accessPermissionId = $(this).find('#accessPermissionId').val();
        var roleId = $(this).find('#roleId').val();
        var controllerType = $(this).find('#controllerType').val();
        var controller = $(this).find('#controller').val();
        var action = $(this).find('#action').val();
        $.ajax({
            url: 'accessPermissions/updatePermission',
            type: 'GET',
            data: {status: status, accessPermissionId: accessPermissionId, roleId: roleId, controllerType: controllerType, controller: controller, action: action},
            success: function (response) {
                var result = JSON.parse(response);
                if(result.success == true) {
                    if(row.hasClass('active')) {
                        row.removeClass('active fa fa-check');
                        row.addClass('inactive fa fa-times');
                    } else {
                        row.removeClass('inactive fa fa-times');
                        row.addClass('active fa fa-check');
                    }
                    row.find('#accessPermissionId').val(result.permissionId);// setting the new permissionid
                }
            },
            error: function (error) {
                console.log(error);
            }
        })

    }
});