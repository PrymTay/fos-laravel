@extends('layouts.header')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>The Team</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Phone Number</th>
            <th>email</th>
            <th width="280px">Action</th>
        </tr>
        
        <input type="hidden" value="{{ $i = 0 }}">
        @foreach ($users as $userData)
        <tr>
           
            <td>{{ ++$i }}</td>
            <td>{{ $userData->phone }}</td>
            <td>{{ $userData->email }}</td>
            <td>
                <form action="{{ route('users.destroy',$userData->id) }}" method="POST">
                   
                    <a class="btn btn-info" href="{{ route('users.show',$userData->id) }}">Show</a>

 
    
                    <a class="btn btn-primary" href="{{ route('users.edit',$userData->id) }}">Edit</a>
                    <!-- SUPPORT ABOVE VERSION 5.5 -->
                    {{-- @csrf
                    @method('DELETE') --}} 
                    
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                  
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {{-- {!! $users->links() !!} --}}
      
@endsection 