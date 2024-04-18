const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
    },
});

$(document).on('click', '#save', function (e) {
    e.preventDefault();
    var userid = $("#userid").val();
    $('#new_password_error').text('');
    $('#new_password_confirmation_error').text('');
    var formData = new FormData($('#password')[0]);
    $.ajax({
        type: 'post',
        url: "/changepasswordsave/"+userid,
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        success: function (data) {
            Toast.fire({
                icon: "success",
                title: "User Pasword has been updated",
            });
        }, error: function (reject) {
            var response = $.parseJSON(reject.responseText);
            $.each(response.errors, function (key, val) {
                $("#" + key + "_error").text(val[0]);
            });
        }
    });
});