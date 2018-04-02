$(document).ready(function() {
    //toggle `popup` / `inline` mode
    $.fn.editable.defaults.mode = 'popup';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //make username editable
    $('.catEdit').editable({
        url: '/cats',
        ajaxOptions: {
            type: 'put',
            dataType: 'json'
        },
        error: function (data) {
            console.log('Error:' , data);
        },
    });


});