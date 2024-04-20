// alert massage
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
// ajax setup
$.ajaxSetup({
    headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
});
// dataTable
var table;
$(function () {
    var showUser = $("#showUser").val();
    if(lang == 'ar'){
        var language = {

            "sProcessing": "جارٍ التحميل...",
            "sLengthMenu": "أظهر _MENU_ مدخلات",
            "sZeroRecords": "لم يعثر على أية سجلات",
            "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
            "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
            "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
            "sInfoPostFix": "",
            "sSearch": "ابحث:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "الأول",
                "sPrevious": "السابق",
                "sNext": "التالي",
                "sLast": "الأخير"
            }
        
        };
    } 
    table = $(".data-table").DataTable({
        language: language,
        processing: true,
        serverSide: true,
        lengthMenu: [[10,25, 100, -1], [10,25, 100, "All"]],
        dom : 'lBfrtip',
        buttons: ['colvis',
        {extend: 'excel',   text: '<span class="fa fa-file-excel-o"></span> Excel Export',
        exportOptions: {
            columns: [0, 1, 2, 3,4,5,6]
        }},
        {extend: 'pdf',   text: '<span class="fa fa-file-pdf-o"></span> pdf Export',
        exportOptions: {
            columns: [0, 1, 2, 3,4,5,6]
        }},
        {extend: 'csv',   text: '<span class="fa fa-file-o"></span> csv Export',
        exportOptions: {
            columns: [0, 1, 2, 3,4,5,6]
        }},{
        text: 'csv all',
        action: function ( e, dt, node, config ) {
            $('.dt-length').val('True');
            var myTable = this;
            table.ajax.reload( function ( json ) {
                $('.buttons-csv').click();
        }); }
        }
        ],
        // 
        ajax: {
            url: showUser,
            data: function (d) {
                d.start_date = $("#startdate").val();
                d.end_date = $("#enddate").val();
            },
        },
        columns: [
            { data: "firstname", name: "firstname" },
            { data: "lastname", name: "lastname" },
            { data: "address", name: "address" },
            { data: "country", name: "country" },
            { data: "images", name: "images" },
            { data: "phone_number", name: "phone_number" },
            { data: "email", name: "email" },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false,
            },
        ],
    });
    $("div.dt-search input").unbind();
    $("div.dt-search input").keyup(function (e) {
        if (e.keyCode == 13) {
            $(".data-table").DataTable().search($(this).val()).draw();
        }
    });
});

// delete using ajax
var deleteUser = $("#deleteUser").val();
var lang = $("#lang").val();
if(lang == 'ar'){
  var text = ["هل تريد حذف هذا المستخدم؟","الغاء","نعم , حذف","تم حذف المستخدم",];
}else{
  var text =["You want to <b>delete</b> this","Cancel","Yes, Delete","User has been deleted",];
}
$(document).on("click", "#delete", function (e) {
    e.preventDefault();
    var user_id = $(this).data("id");
    var url = deleteUser;
    console.log(deleteUser);
        swal.fire({
            icon :"warning",
            html: text[0],
            showCancelButton: true,
            showCloseButton: true,
            cancelButtonText: text[1],
            confirmButtonText: text[2],
            cancelButtonColor: "#d33",
            confirmButtonColor: "#556ee6",
            width: 300,
            allowOutsideClick: false,
        })    .then(function (result) {
            if (result.value) {
                $.post(
                    url,
                    { user_id: user_id },
                    function (data) {
                        if (data.code == 1) {
                            $(".data-table").DataTable().ajax.reload(null, false);
                            $("#edituser").modal("hide");
                            Toast.fire({
                                icon: "error",
                                title: text[3],
                            });
                        } else {
                            $("#success_msg").data("msg");
                        }
                    },
                    "json"
                );
            }
        });
    });


// update using ajax
$(document).on("click", "#edit", function (e) {
    e.preventDefault();
    var user_id = $(this).data("id");
    $("#edituser").modal("show");
    $.ajax({
        type: "get",
        url: "/getuser/" + user_id,
        success: function (response) {
            $("#firstname").val(response.user.firstname);
            $("#lastname").val(response.user.lastname);
            $("#country").val(response.user.country);
            $("#role").val(response.user.role);
            $("#email").val(response.user.email);
            $("#phone_number").val(response.user.phone_number);
            $("#address").val(response.user.address);
            $("#userid").val(user_id);
            $("#image").val(response.user.iamge);
        },
    });
});

$(document).on("click", "#updateuser", function (e) {
    e.preventDefault();
    $("#role_error").text("");
    $("#firstname_error").text("");
    $("#lastname_error").text("");
    $("#country_error").text("");
    $("#email_error").text("");
    $("#image_error").text("");
    $("#phone_number_error").text("");
    $("#address_error").text("");

    var user_id = $("#userid").val();
    var formData = new FormData($("#UpdateUserForm")[0]);
    $.ajax({
        type: "post",
        url: "/admin/updateuser/" + user_id,
        data: formData,
        enctype: "multipart/form-data",
        dataType: "json",
        processData: false,
        contentType: false,
        cache: false,
        success: function (response) {
            $("#edituser").modal("hide");
            $(".data-table").DataTable().ajax.reload(null, false);
            if(lang == 'ar'){
                Toast.fire({
                    icon: "success",
                    title: "تم تعديل السمستخدم",
                });
            }else{
                Toast.fire({
                    icon: "success",
                    title: "User has been updated",
                });
            }
         
        },
        error: function (reject) {
            var response = $.parseJSON(reject.responseText);
            $.each(response.errors, function (key, val) {
                $("#" + key + "_error").text(val[0]);
            });
        },
    });
});

// show user information
$(document).on("click", "#shwo", function (e) {
    e.preventDefault();
    var user_id = $(this).data("id");
    $.get("/getuser/" + user_id, function (data) {
        $("#showUserFirstName").text(data.user.firstname);
        $("#ShowUserLastName").text(data.user.lastname);
        $("#ShowUserCountry").text(data.user.country);
        $("#ShowUsreAddress").text(data.user.address);
        if(data.user.image != null){
            $("#UserImage").attr("src", "/storage/" + data.user.image + "");
        }else{
            $("#UserImage").attr("src", "/storage/userdefault/defaultImage.png");
        }
        $("#ShowUserEmail").text(data.user.email);
        $("#ShowUserPhone").text(data.user.phone_number);
        $("#ShowUserRole").text(data.user.role);
    });
    $("#showuser").modal("show");
});

// search
$("#countrySelect").change(function () {
    $(".data-table").DataTable().column(3).search($(this).val()).draw();
});
$("#filterbtn").click(function (e) {
    e.preventDefault();
    table.draw();
});

$('input[type="file"][name="image"]').val('');
   $('input[type="file"][name="image"]').on('change', function(){
       var img_path = $(this)[0].value;
       var img_holder = $('.img-holder');
       var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();
       if(extension == 'jpeg' || extension == 'jpg' || extension == 'png'){
            if(typeof(FileReader) != 'undefined'){
                 img_holder.empty();
                 var reader = new FileReader();
                 reader.onload = function(e){
                     $('<img/>',{'src':e.target.result,'class':'img-fluid','style':'max-width:150px;margin-bottom:10px;'}).appendTo(img_holder);
                 }
                 img_holder.show();
                 reader.readAsDataURL($(this)[0].files[0]);
            }else{
                $(img_holder).html('This browser does not support FileReader');
            }
       }else{
           $(img_holder).empty();
       }
   });

   
// update password using ajax
$(document).on("click", "#changepassword", function (e) {
    e.preventDefault();
    var user_id = $(this).data("id");
    $("#changePasswordModel").modal("show");
    $("#userid").val(user_id);
});

$(document).on("click", "#updatepassword", function (e) {
    e.preventDefault();
    $("#new_password_error").text("");
    $("#new_password_confirmation_error").text("");
    var user_id = $("#userid").val();
    console.log(user_id);
    var formData = new FormData($("#changePasswordForm")[0]);
    $.ajax({
        type: "post",
        url: "/changepasswordsave/" + user_id,
        data: formData,
        enctype: "multipart/form-data",
        dataType: "json",
        processData: false,
        contentType: false,
        cache: false,
        success: function (response) {
            $("#changePasswordModel").modal("hide");
            $(".data-table").DataTable().ajax.reload(null, false);
            if(lang == 'ar'){
                Toast.fire({
                    icon: "success",
                    title: "تم تغيير كلمة السر للمستخدم",
                });
            }else{
                Toast.fire({
                    icon: "success",
                    title: "User Password have been updated",
                });
            }
        },
        error: function (reject) {
            var response = $.parseJSON(reject.responseText);
            $.each(response.errors, function (key, val) {
                $("#" + key + "_error").text(val[0]);
            });
        },
    });
});

