@extends('layouts.master')
@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Table</title> 
  
</head>
<body>
    <a class="btn btn-primary" style="color: #fff" href="{{route('admin.addUser')}}">  add user </a>
<section style="padding-top: 60px">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            {!! $dataTable->table() !!}

        </div>
    </div>
</div>
</section>

    {!! $dataTable->scripts() !!}

</body>
</html>
@endsection