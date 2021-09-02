@extends('layouts.header')
@section('content')
<div>
    <form action="{{ route('addMenu') }}" method="POST">
    @csrf
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Food Name</th>
            <th scope="col">Price</th>
       
          </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td><input type="text" placeholder="enter food name eg rice" name="name"></td>
                <td><input type="text" placeholder="enter price eg 5000/=" name="price"></td>
                <td><div class ="zmdi zmdi-account material-icons-name"><box-icon name='trash'></box-icon></td> 
                
                </tr>
                <tr>
                <td colspan="3">
                    <div>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Add') }}
                        </button>
                        {{-- <input type="submit" value="ADD" class="btn btn-success" name="add-menu">    --}}

          </div></td></tr>
        </tbody>
      </table>
    </form>
</div>
@endsection