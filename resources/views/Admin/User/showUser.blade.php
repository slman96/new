@extends('layouts.master')
@section('content')

<div class="container">
    <div class="alert alert-success"  style="display: none;">
       <a id="success_msg"></a>
    </div>
    <h1> user</h1>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>address</th>
                <th>country</th>
                <th>image</th>
                <th>role</th>
                <th>phone</th>
                <th>Email</th>
                <th width="100px">action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

@include('Admin.User.Modal.showUser')
@include('Admin.User.Modal.editUser')

<script>

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
        }
});

// ajax setup

$.ajaxSetup({
             headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}
});

// dataTable

$(function () {
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "",
        columns: [
            {data: 'firstname', name: 'firstname'},
            {data: 'lastname', name: 'lastname'},
            {data: 'address', name: 'address'},
            {data: 'country', name: 'country'},
            {data: 'images', name: 'images'},
            {data: 'role', name: 'role'},
            {data: 'phone', name: 'phone'},
            {data: 'email', name: 'email'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });

  // delete using ajax
$(document).on('click','#delete', function (e) {
                    e.preventDefault();
                    var user_id = $(this).data('id');
                    var url = '{{ route("admin.UserDestroy") }}';
                    swal.fire({
                         title:'Are you sure?',
                         html:'You want to <b>delete</b> this',
                         showCancelButton:true,
                         showCloseButton:true,
                         cancelButtonText:'Cancel',
                         confirmButtonText:'Yes, Delete',
                         cancelButtonColor:'#d33',
                         confirmButtonColor:'#556ee6',
                         width:300,
                         allowOutsideClick:false
                    }).then(function(result){
                          if(result.value){
                              $.post(url,{user_id:user_id}, function(data){
                                   if(data.code == 1){
                                       $('.data-table').DataTable().ajax.reload(null, false);
                                       $('#edituser').modal('hide');
                                Toast.fire({
                                   icon: "error",
                                   title: "User has been deleted"
                                });
                                   }else{
                                       $('#success_msg').data('msg');
                                   }
                              },'json');
                          }
                    });    
});

// update using ajax
$(document).on('click','#edit', function(e){
                    e.preventDefault();
                    var user_id = $(this).data('id');
                    $('#edituser').modal('show');
                    $.ajax({
                        type :"get",
                        url : "/getuser/"+user_id,
                        success: function (response) {
                           $("#firstname").val(response.user.firstname);
                           $("#lastname").val(response.user.lastname);
                           $("#country").val(response.user.country);
                           $("#role").val(response.user.role);
                           $("#email").val(response.user.email);
                           $("#phone").val(response.user.phone);
                           $("#address").val(response.user.address);
                           $("#userid").val(user_id);
                           $("#image").val(response.user.iamge);}
                    });

});


$(document).on('click','#updateuser',function(e){
                    e.preventDefault();
                $('#role_error').text('');
                $('#firstname_error').text('');
                $('#lastname_error').text('');
                $('#country_error').text('');
                $('#email_error').text('');
                $('#image_error').text('');
                $('#phone_error').text('');
                $('#address_error').text('');
               
                   var user_id = $('#userid').val();
                   var formData = new FormData($('#UpdateUserForm')[0]);
                    $.ajax({
                        type : "post",
                        url :"/admin/updateuser/"+user_id,
                        data : formData,
                        enctype: 'multipart/form-data',
                        dataType :"json",
                        processData: false,
                        contentType: false,
                        cache: false,
                    success: function (response) {
                            $('#edituser').modal('hide');
                            $('.data-table').DataTable().ajax.reload(null, false);
                                Toast.fire({
                                   icon: "success",
                                   title: "User has been updated",
                                });
                    }, error: function (reject) {
                        var response = $.parseJSON(reject.responseText);
                        $.each(response.errors, function (key, val) {
                            $("#" + key + "_error").text(val[0]);
                        });
                    }
                    });

})
              

// show user information
$(document).on('click','#shwo', function (e) {
                    e.preventDefault();
                    var user_id = $(this).data('id');
                    $.get('/getuser/'+user_id, function(data){
                        $('#showUserFirstName').text(data.user.firstname);
                        $('#ShowUserLastName').text(data.user.lastname);
                        $('#ShowUserCountry').text(data.user.country);
                        $('#ShowUsreAddress').text(data.user.address);
                        $("#UserImage").attr('src','/storage/'+data.user.image+'');
                        $('#ShowUserEmail').text(data.user.email);
                        $('#ShowUserPhone').text(data.user.phone);
                        $('#ShowUserRole').text(data.user.role);});
                        $('#showuser').modal('show');
                       
                });
</script>
</html>
@endsection