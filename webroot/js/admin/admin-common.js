$(document).ready(function(){

    $('body').delegate('.btn-cancel','click', function(e){
        e.preventDefault();

        if(current_controller == 'Settings'){
            var url = home_url+'admin/Dashboard';
        }else{
            var url = home_url+'admin/'+current_controller;
        }
        location.href = url;
    });

});


function update_upload_status(element,value){
    if(jQuery("#"+element).length){
        jQuery("#"+element).val(value);

        jQuery("#"+element).closest('form').validate().element(jQuery("#"+element));
    }
}