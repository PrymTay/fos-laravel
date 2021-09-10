@extends('layouts.header')
@section('content')

<form id="order-form" method="POST" action="{{ route('order.store') }}">
@csrf
  @section('content')
  <div class="home-contnt">
    <div class="row">
      {{-- <div class="col-lg-12 margin-tb">
          <div class="pull-left">
              <h2>Menu</h2>
          </div>
          {{-- <div class="pull-right">
           
              {{-- <a class="btn btn-success" href="{{ route('order.show') }}"> View Order</a> 
          </div> --}}
      </div> 
  </div>

 


<div class="home-cntent" >


  <div class="sales-boxes">
    <div class="recent-sales box">

   
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
      <p>{{ $message }}</p>
  </div>
@endif

@if ($message = Session::get('danger'))
<div class="alert alert-danger">
  <p>{{ $message }}</p>
</div>
@endif

<div class="col-lg-12 margin-tb">
  <div class="pull-left">
      <h2>The Menu</h2>
  </div>
  <div class="pull-right">
    <h2><a class="btn btn-success" href="{{ route('food.index') }}">Edit Menu</a></h2>
    
  </div>
  
</div>
  
  <div class="sals-details">
 
  <table class="table table-bordered ">
      <tr>
          <th>#</th>
          <th>Food</th>
          <th>Price</th>
          <th width="28px">Action</th>
      </tr>
    <input type="hidden" name="total" id="sum-price">
    <input type="hidden" name="food_ids" id="id-food_ids">
    <input type="hidden" value="{{ $i = 0 }}">

      @foreach ($menuTable as $menu)
      
     <tr data-foodPrice="{{ $menu->price }}" data-foodID = {{ $menu->id }}>
         
          <td>{{ $i++ }}</td>
          <td> {{ $menu->name }}</td>
          <td>{{ $menu->price }}</td>
          <td class="text-center"> 
            <input type="hidden" name="checkbox[]" class="check" value="0">  
            <input type="checkbox" class="check" name="checkbox[]" value="{{ $menu->price }} ">
               {{-- <form action="{{ route('order.destroy',$menu->id) }}" method="POST">
               
                @csrf
              
              </form>  --}}
          </td>
      </tr>
      @endforeach
      <tr style="font-size: x-large;">
        <td colspan="2">TOTAL COST </td>
        <td colspan="2"><strong id="total_amount"></strong></td>
        
      </tr><br />
      <tr>
        <td colspan="4">
          <button type = "submit" class="btn btn-success btn-lg order-btn" id="order-btn">Order Now</button>
        </td>
      </tr>
     
  </table>
</form>
  {{-- <a class="btn btn-success" href="{{ route('order.show',$menu->id) }}">Past Orders</a> --}}
  
  </div>
    </div>
  </div>
  </div>

    
    {{-- {!! $users->links() !!} --}}
  
 @endsection
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
 {{-- <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script> --}}


 
<script>

$(document).ready(function() {
  
     let total = 0;
     let foodIds = [];
     $(document).on('click', 'input.check', function() {
       const foodID = $(this).closest('tr').attr('data-foodID') 
       const foodPrice = $(this).closest('tr').attr('data-foodPrice')
     
       if ($(this).is(":checked")) {
       
         foodIds.push(foodID)
        
         total += parseInt(foodPrice);
         $("#total_amount").html(total)
         $("#sum-price").val(total)
       } else {
   
         total -= parseInt(foodPrice);
         const indexToRemove = foodIds.indexOf(foodID)
         foodIds.splice(indexToRemove, 1)
         $("#total_amount").html(total)
         $("#sum-price").val(total)
       }

     })
     const form = $("#order-form")
     form.on('submit', function (e) {
       const selectedFoods = JSON.stringify(foodIds)
       console.log(selectedFoods)
       $("#id-food_ids").val(selectedFoods)
       const formData = form.serializeArray()
       console.log(formData)
     })

   });
  </script>