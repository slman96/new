


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
$('#password_error').text('');

var formData = new FormData($('#adduser')[0]);
var store = $('#storeRoute').val();
console.log(store);
 $.ajax({
   type: 'post',
   enctype: 'multipart/form-data',
   url: store,
   data: formData,
   processData: false,
   contentType: false,
   cache: false,
   success: function (data) {
             console.log('slman');
       }, error: function (reject) {
       var response = $.parseJSON(reject.responseText);
       $.each(response.errors, function (key, val) {
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

