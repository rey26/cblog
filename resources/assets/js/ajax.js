$(document).ready(function(){
    // title slug generator @ layouts/create.blade.php
    $("#title").keyup(function(){
        var title=$("#title").val();
        $("#slug").val(title.toLowerCase().replace(/ /g, '-'));

    });

    // username slug generator @ auth/register.blade.php
    $("#name").keyup(function () {
        $("#username").val($("#name").val().toLowerCase().replace(/ /g, '.'));
    })

    // ajax  @ layouts/create.blade.php
    $("#addTag").click(function () {
            $("#addTagDialog").removeClass("hidden");
    });

    $("#saveTagBtn").click(function (e) {
        e.preventDefault();
        var newTagBody=$("#newTagBody").val();
            $("#newTagBody").val("");
        var output= '<input type="checkbox" id="tags" name="tags[]" value="{{$tag->id}}"><label for="tags[]">' + newTagBody + '</label><br>';
        $("#freshTags").append(output);

    })


});
