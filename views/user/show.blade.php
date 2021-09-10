@extends('layouts.header')
@section('content')
<div class="home-contnt" >

   <div class="sales-boxes">
      <div class="recent-sales box">
<div class="row">

    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> {{ $users->firstname }}'s Details</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.index') }}"> Back</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>First Name:</strong>
            {{ $users->firstname }}
        </div>
        <div class="form-group">
            <strong>Last Name:</strong>
            {{ $users->lastname }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>username:</strong>
            {{ $users->username }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $users->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Phone:</strong>
            {{ $users->phone }}
        </div>
    </div>
</div>
@endsection
