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
            columns: [0, 1, 2, 3,5,6]
        }},
        {extend: 'pdfHtml5',   text: '<span class="fa fa-file-pdf-o"></span> pdf Export',
        exportOptions: {
            columns: [0, 1, 2, 3,5,6]
        },
        customize: function (doc){
            var now = new Date();
            var jsDate = now.getDate()+'-'+(now.getMonth()+1)+'-'+now.getFullYear();
            var logo = 'data:image/png;base64,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'
            doc['header']=(function() {
                return {
                    columns: [
                        {
                            image: logo,
                            width: 70
                        },
                    ],
                    margin: 20
                }
            });
            doc['footer']=(function(page, pages) {
                return {
                    columns: [
                        {
                            alignment: 'left',
                            text: ['Created on: ', { text: jsDate.toString() }]
                        },
                        {
                            alignment: 'right',
                            text: ['page ', { text: page.toString() },	' of ',	{ text: pages.toString() }]
                        }
                    ],
                    margin: 20
                }
            });
        }
        },
        {extend: 'csv',   text: '<span class="fa fa-file-o"></span> csv Export',
        exportOptions: {
            columns: [0, 1, 2, 3,5,6]
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

