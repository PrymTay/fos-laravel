@extends('layouts.app')
@extends('layouts.userHeader')
@section('content')

  
<div class="home-content">
    <form action="view.php" method="POST">
    <div class="container">
    <div class="row">
      <div class="col-md-3">
              <div class="card">
            <button class="btn btn btn-success btn-block" name = "user-add-btn">Add New User</button>
      </div>
      </div>
      <div class="col-md-3">
              <div class="card">
            <button class="btn btn btn-success btn-block" name="menu-add-btn">Add item to menu</button>
      </div>
      </div>
      <div class="col-md-3">
              <div class="card">
            <button class="btn btn btn-success btn-block" name="edit-menu-btn">Edit Menu</button>
      </div>
      </div>
      <div class="col-md-3">
              <div class="card">
            <button class="btn btn btn-success btn-block" name="user-edit-btn">Edit User</button>
      </div>
      </div>
      </div>
    </div>
    </form>
      
  
    </div>


@endsection