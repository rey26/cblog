function addCheckBox(data) {
    let output= '<div id="tagGroup'+ data.id+'"><input type="checkbox" id="tags" name="tags[]" value="'+ data.id + '" checked/><span id="tagName'+data.id+'">'+data.name +'</span>';
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

function tagUpdater() {

    $(".editTag").on('click', function () {
        let tag_id = $(this).val();

        $("#addTagDialog").hide();
        $("#tagGroup" + tag_id).hide();
        let text=$("#tagGroup" + tag_id).text();
        let dialog='<div id="editTag"> <input id="updatedTag" value="'+ text+'" type="text" autofocus/> <button id="save" class="btn-info btn" type="button"> <i class="fas fa-check"></i> </button></div>';
        $("#freshTags").append(dialog);

        $("#save").click(function () {
            $("#updatedTag").hide();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let formData = {
                id: tag_id,
                name: $("#updatedTag").val(),
            };
            console.log(formData);
            $.ajax({
                type:"PUT",
                url:'/tags/'+tag_id,
                data:formData,
                dataType:'json',
                success:function (data) {
                        addCheckBox(data);
                        $("#editTag").hide();
                    $("#newTagBody").val("");
                    $("#addTagDialog").show();
                    tagDeleter();
                    tagUpdater();
                },
                error:function (data) {
                    console.log('Error', data);
                },
            })


        })
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
                tagUpdater();
            },
            error:function (data) {
                console.log('Error: ', data);
            },

        });
        tagDeleter();
    })

})