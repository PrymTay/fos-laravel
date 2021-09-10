@extends('layouts.header')
@section('content')

    <div class="sales-boxes">
      <div class="recent-sales box">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('users.store') }}" method="POST">
    @csrf
  
     <div class="row" >
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>First Name:</strong>
                <input type="text" name="firstname" class="form-control" placeholder="first name">
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Last Name</strong>
                <input type="text" class="form-control" name="lastname" placeholder="last name">
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>User Name</strong>
                <input type="text" class="form-control" name="username" placeholder="username">
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>email</strong>
                <input type="text" class="form-control" name="email" placeholder="Email Id">
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>phone</strong>
                <input type="text" class="form-control" name="phone" placeholder="Phone">
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-62">
            <div class="form-group">
                <strong>Password</strong>
                <input type="text" class="form-control" name="password" placeholder="Password">
            </div>
        </div>
       

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </div>
   
</form>
@endsection  
