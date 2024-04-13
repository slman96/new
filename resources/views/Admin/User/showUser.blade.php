@extends('layouts.master')
@section('content')

<div class="container">
    <div class="card">
        <h5 class="card-header">Add User</h5>
        <div class="card-body">
          <a href="{{route('admin.addUser')}}" class="btn btn-primary">Add User</a>
        </div>
      </div>
    </br>
    <h1> user</h1>
    @include('Admin.User.filter.select')
    <a>filter by date</a>
    <div  id="daterange" class="float-end" style="background:#fff ; cursor:pointer;padding:5px 10px;border:1px solid #ccc;width 100% ; text-aligh: center">
    <i class="fa fa-calendar"></i>&nbsp;
    <span></span>
    <i class="fa fa-caret-down"></i>

   </div>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>address</th>
                <th>country</th>
                <th>image</th>
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
    var start_date = moment().subtract(1, 'M');
    var end_date = moment();

  $('#daterange span').html(start_date.format('MMMM D, YYYY') + ' - ' + end_date.format('MMMM D, YYYY'));

  $('#daterange').daterangepicker({
    startDate : start_date,
    endDate : end_date
  }, function(start_date, end_date){
    $('#daterange span').html(start_date.format('MMMM D, YYYY') + ' - ' + end_date.format('MMMM D, YYYY'));

    table.draw();
    });
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url:"{{ route('admin.showUser') }}",
            data : function(data){
                data.from_date = $('#daterange').data('daterangepicker').startDate.format('YYYY-MM-DD');
                data.to_date = $('#daterange').data('daterangepicker').endDate.format('YYYY-MM-DD');
            }
        },
        columns: [
            {data: 'firstname', name: 'firstname'},
            {data: 'lastname', name: 'lastname'},
            {data: 'address', name: 'address'},
            {data: 'country', name: 'country'},
            {data: 'images', name: 'images'},
            {data: 'phone_number', name: 'phone'},
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
                           $("#phone_number").val(response.user.phone_number);
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
                $('#phone_number_error').text('');
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
                        $('#ShowUserPhone').text(data.user.phone_number);
                        $('#ShowUserRole').text(data.user.role);});
                        $('#showuser').modal('show');
                       
});

// search
$('#countrySelect').change(function(){
    if($(this).val() == "All"){
     return   $('.data-table').DataTable();
    }else{
        $('.data-table').DataTable().column(3).search($(this).val()).draw();
    }
  
});


</script>
</html>
@endsection