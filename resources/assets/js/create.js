function addCheckBox(data) {
    let output= '<div id="tagGroup'+ data.id+'"><input type="checkbox" id="tags" name="tags[]" value="'+ data.id + '" checked/><a href="#" class="tagEdit" data-name="name" data-type="text" data-pk="'+ data.id+'" data-title="Enter name">'+ data.name+'</a>';
    output+='&nbsp;<button class="btn btn-danger btn-xs deleteTag" value="'+ data.id +'" type="button"><i class="fas fa-times"></i></button>';
    output+='&nbsp;<button class="btn btn-primary btn-xs editTag" value="'+ data.id +'" type="button"><i class="fas fa-edit"></i></button><br></div>';
    $("#freshTags").append(output);
}
function tagDeleter() {

    $(".deleteTag").on('click', function () {
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
        let tag_id=$(this).val();
        $.ajax({
            type:"DELETE",
            url:'/tags/'+tag_id,
            success:function () {
                $("#tagGroup" + tag_id).remove();
            },
            error:function (data) {
                console.log('Error', data);
            },
        })
    });
}

function editableTag(element=".tagEdit", url='/tags') {
        $.fn.editable.defaults.mode = 'popup';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // edit cat info
        $(element).editable({
            url: url,
            ajaxOptions: {
                type: 'put',
                dataType: 'json'
            },
            error: function (data) {
                console.log('Error:' , data);
            },
        });
    }


$(document).ready(function() {
    // title slug generator @ layouts/create.blade.php
    $("#title").keyup(function () {
        $("#slug").val($("#title").val().toLowerCase().replace(/ /g, '-'));

    });

    // ajax create  @ layouts/create.blade.php
    $("#addTag").click(function (e) {
        e.preventDefault();
        $("#addTagDialog").removeClass("hidden");
        $("#addTag").hide();
    })


    $("#saveTagBtn").click(function (e) {
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        let formData={
          name:$('#newTagBody').val(),
        };

        let type="POST";
        let ajaxurl="/tags";
        $.ajax({
            type:type,
            url:ajaxurl,
            data:formData,
            dataType:'json',
            success:function (data) {
                addCheckBox(data);
                $("#newTagBody").val("");
                tagDeleter();
                editableTag();
            },
            error:function (data) {
                console.log('Error: ', data);
            },

        });
        tagDeleter();
    })

})