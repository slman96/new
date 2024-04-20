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
    headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}
});

$(document).on('click', '#save', function (e) {
e.preventDefault();
$('#firstname_error').text('');
$('#lastname_error').text('');
$('#email_error').text('');
$('#image_error').text('');
$('#phone_number_error').text('');
$('#address_error').text('');
$('#password_error').text('');
$('#password_confirmation_error').text('');

var formData = new FormData($('#adduser')[0]);
var store = $('#storeRoute').val();
var lang = $("#lang").val();
console.log(store);
 $.ajax({
   type: 'post',
   enctype: 'multipart/form-data',
   url: store,
   data: formData,
   processData: false,
   contentType: false,
   cache: false,
   success: function (response) {
    if(lang == 'ar'){
        Toast.fire({
            icon: "success",
            title: "تمت إضافة المستخدم",
        });
    }else{
        Toast.fire({
            icon: "success",
            title: "User added ",
        });
    }
       }, error: function (reject) {
       var response = $.parseJSON(reject.responseText);
       $.each(response.errors, function (key, val) {
        if(lang == 'ar'){
            Toast.fire({
                icon: "error",
                title: "لم يتم اضافة المستخدم هناك مشكلة",
            });
        }else{
            Toast.fire({
                icon: "error",
                title: "The user was not added. There is a problem",
            });
        }
           $("#" + key + "_error").text(val[0]);
       });
   }
});
});


// image preview
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

