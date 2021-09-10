@extends('layouts.header')
 
@section('content')
<style>
    .sals-boxes{
        width: 100%;
        background: #fff;
        padding: 20px 30px;
        margin: 0 20px;
        border-radius: 12px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }
    </style>

    <div class="sals-boxes">
      <div class="recent-sales box">
    <div class="row">
        
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>The Team</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
            </div>
            
        </div>
    </div>
   
   
   
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
                   
                    <a class="btn btn-info" href="{{ route('users.show',$userData->id) }}">More</a>

 
    
                    <a class="btn btn-primary" href="{{ route('users.edit',$userData->id) }}">Edit</a>
                    <!-- SUPPORT ABOVE VERSION 5.5 -->
                    {{-- @csrf
                    @method('DELETE') --}} 
                    
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}                 
      
                    <button type="submit" class="btn btn-danger delete" onclick="if (!confirm('User will be permanently deleted, are you sure?')) { return false }"><span>Delete</button>
                    
                    
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{-- <script>
        var deleteLinks = document.querySelectorAll('.delete');

   for (var i = 0; i < deleteLinks.length; i++) {
    deleteLinks[i].addEventListener('click', function(event) {
        event.preventDefault();

        var choice = confirm(this.getAttribute('data-confirm'));

        if (choice) {

            window.location.href = this.getAttribute('href');
        }
    });
}
    </script> --}}
  
    {{-- {!! $users->links() !!} --}}
      
@endsection 