@extends('layouts.header')
{{-- @extends('layouts.app') --}}


@section('content')

<div class="home-content">
    <form action="{{ route('adminActions') }}" method="POST">
      @csrf
    <div class="container">
    <div class="row">
    
      <div class="col-md-6">
              <div class="card">
            <button class="btn btn btn-success btn-block" name="btn" value="addItem">Add item to menu</button>
      </div>
      </div>
      <div class="col-md-6">
              <div class="card">
            <button class="btn btn btn-success btn-block" name="btn" value="editMenu">Edit Menu</button>
      </div>
      </div>
     
      </div>
    </div>
    </form>

    <form action="{{ route('adminActions') }}" method="POST">
      @csrf
    <div class="container">
    <div class="row">
      <div class="col-md-6">
              <div class="card">
            <a href="{{ route('registered') }}"><button class="btn btn btn-success btn-block" name = "btn" value="addUser">Add New User</button></a>
      </div>
      </div>
     
      <div class="col-md-6">
              <div class="card">
            <button class="btn btn btn-success btn-block" name="btn" value="editUser">Edit User</button>
      </div>
      </div>
      </div>
    </div>
    </form>
      
  
    </div>


@endsection