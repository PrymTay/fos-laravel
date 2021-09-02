 
@extends('layouts.header')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right"> 
            <h3>Menu</h3>
        </div>
        <div class="pull-left">
            <a class="btn btn-success" href="{{ route('food.create') }}"> Create New Menu Item</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered" width = "80%">
    <tr>
        <th>No</th>
        <th>Food Item</th>
        <th>Price</th>
        <th width="80%">Action</th>
    </tr>
    
    @foreach ($menuItem as $item)
    <tr><input type="hidden" value=" {{ $i = 0  }}"></tr>

    <tr>
        
        <td>{{ ++$i }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->price }}</td>
        <td>
            <form action="{{ route('food.destroy',$item->id) }}" method="POST">
               
                <a class="btn btn-info" href="{{ route('food.show',$item->id) }}">Show</a>



                <a class="btn btn-primary" href="{{ route('food.edit',$item->id) }}">Edit</a>
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

{{-- {!! $menuItem->links() !!} --}}
  
@endsection 

