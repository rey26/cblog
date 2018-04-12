function newCat(data) {
let output='<div class="panel panel-default col-lg-push-2 col-lg-4 col-md-6  col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1" >';
       output+='<div id="catPanel'+data.id+'" class="panel-body">';
         output+='<h3><a href="#" class="catEdit" data-name="title" data-type="text" data-pk="'+ data.id+'" data-title="Enter name">'+ data.title+'</a></h3>';

         output+='</div> </div>'
    $("#catView").append(output);
}

function editableExt(element=".catEdit", url='/cats') {
    $.fn.editable.defaults.mode = 'popup';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // edit category info
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

function saveCat() {
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    });
    let title=$("#catName").val();
    let slug=title.toLowerCase();
    let formData={
        title:title,
        slug:slug,
        parentId:0
    }
    $.ajax({
        type:"POST",
        url:'/cats',
        data:formData,
        dataType:'json',
        success: function (data) {
            newCat(data);
            $("#catEdit").hide()
            $("#freshCat").append('<div id="freshTitle" class="col-sm-8 text-uppercase" style="margin: 1em"><a href="#" class="catEdit" data-name="title" data-type="text" data-pk="'+ data.id+'" data-title="Enter name">'+ data.title+'</a></div>')
            $("#saveChildBtn").attr('data-parent', data.id);
            editableExt();
            saveChild();
        },
        error:function (data) {
            console.log('Error: ', data);
        }
    })

}

function saveChild() {
    $("#saveChildBtn").click(function (e) {
        e.preventDefault();
        let title = $("#newChildBody").val();
        let slug=title.toLowerCase();
        let parentId = $(this).attr('data-parent');
        let formData={
            title:title,
            slug: slug,
            parentId:parentId
        }
        $.ajax({
            type: "POST",
            url: '/cats',
            data: formData,
            dataType: 'json',
            success: function (data) {
            let freshChild = '<li id="catGroup'+data.id+'"><a href="#" class="catEdit" data-name="title" data-type="text" data-pk="'+ data.id+'" data-title="Enter name">'+ data.title+'</a><span data-pk="'+data.id+'" class="btn btn-danger btn-sm deleteCat"><i class="fas fa-times"></i></span></li>';
                $("#freshChildren").append(freshChild);
                editableExt();
                deleteCat();
                $("#newChildBody").val("");
                $("#catPanel"+parentId).append(freshChild)
            },
            error:function (data) {
                console.log('Error: ', data);
            }
        })



    })
}

function deleteCat() {
    $(".deleteCat").click(function () {
        console.log('Delete Cat');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let id=$(this).attr('data-pk');
        $.ajax({
            type:"DELETE",
            url: '/cats/'+id,
            success:function () {
                $("#catGroup" + id).remove();
                $("#panel"+id).remove();
            },
            error: function (data) {
                console.log('Error: ', data);
            }
        })
    })
}

$(document).ready(function() {
    //toggle `popup` / `inline` mode
    editableExt();
    deleteCat();

    $("#newCat").click(function () {
        $("#modalFormData").trigger("reset");
        $("#newCatModal").modal("show");
        $("#catChildBox").click(function () {
            $("#catChild").toggleClass("hidden");
        })
        $("#catEdit").keypress(function (e) {
            if (e.which == 13) {
                saveCat()
            }
        })
        $("#saveCatBtn").click(function (e) {
            e.preventDefault();
            saveCat();
        })

    })
    //todo: generate card with subcategories after ajax call
    //todo: delete categories and subcategories if(cat->posts==0)




});