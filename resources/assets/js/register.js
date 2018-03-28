// username slug generator @ auth/register.blade.php
$($("#name").keyup(function () {
    $("#username").val($("#name").val().toLowerCase().replace(/ /g, '.'));})
)