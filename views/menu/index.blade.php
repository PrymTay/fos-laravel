 
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
    <div class="col-lg-12 margin-tb">
        
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

<table class="table table-bordered" >
    <tr>
        <th>No</th>
        <th>Food Item</th>
        <th>Price</th>
        <th style="width: 180px">Action</th>
    </tr>
    <tr><input type="hidden" value=" {{ $i = 0  }}"></tr>
    @foreach ($menuItem as $item)
    

    <tr>
        
        <td>{{ ++$i }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->price }}</td>
        <td>
            <form action="{{ route('food.destroy',$item->id) }}" method="POST">
               
                {{-- <a class="btn btn-info" href="{{ route('food.show',$item->id) }}">Show</a> --}}



                <a class="btn btn-primary" href="{{ route('food.edit',$item->id) }}">Edit</a>&nbsp;&nbsp;&nbsp;
                <!-- SUPPORT ABOVE VERSION 5.5 -->
                {{-- @csrf
                @method('DELETE') --}} 
                
                {{ csrf_field() }}
                {{ method_field('DELETE') }}              
  
                <button type="submit" class="btn btn-danger" onclick="if (!confirm('Food Item will be permanently deleted, are you sure?')) { return false }"><span>Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{-- {!! $menuItem->links() !!} --}}
  
@endsection 

