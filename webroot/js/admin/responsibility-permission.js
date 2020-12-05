/**
 * Created by sourav on 4/05/2017.
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
        var resPermissionId = $(this).find('#resPermissionId').val();
        var respoId = $(this).find('#respoId').val();
        var controllerType = $(this).find('#controllerType').val();
        var controller = $(this).find('#controller').val();
        var action = $(this).find('#action').val();
        $.ajax({
            url: 'responsibilityPermissions/updatePermission',
            type: 'GET',
            data: {status: status, resPermissionId: resPermissionId, respoId: respoId, controllerType: controllerType, controller: controller, action: action},
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
                    row.find('#resPermissionId').val(result.resPermissionId);// setting the new responsibilityId
                }
            },
            error: function (error) {
                console.log(error);
            }
        })

    }
});