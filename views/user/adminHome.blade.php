@extends('layouts.header')
@section('content')

        <div class="overview-boxes">
        
            <div class="box">
                <div class="right-side">
                  <div class="box-topic">Total Users</div>
                  <div class="number">
             
                      @php
                      use App\Models\User;
                           $users = User::all();
                           $usersCount = User::where('is_admin','=','0')->count();
                           echo ($usersCount);
                      @endphp
                  </div>
                  <div class="indicator">
                    <i class='bx bx-up-arrow-alt'></i>
                    <span class="text">Up from yesterday</span>
                  </div>
                </div>
                <i class='bx bxs-user cart one' ></i>
                 
                </div>       
                  
                <div class="box">
                    <div class="right-side">
                      <div class="box-topic">Total orders</div>
                      <div class="number">
                 
                          @php
                          use App\Models\order;
                               $ordersCount = order::all()->count();
                               //$ordersCount = order::where('is_admin','=','0')->count();
                               echo ($ordersCount);
                          @endphp
                      </div>
                      <div class="indicator">
                        <i class='bx bx-up-arrow-alt'></i>
                        <span class="text">Up from yesterday</span>
                      </div>
                    </div>
                    <i class='bx bxs-user cart three' ></i>
                     
                    </div>
                </div>
        </div>
        
    </div>
    <div class="home-content">
        <div class="profile-detail">
            <a href="{{ route('food.index') }}">Current Menu</a>
        </div>
    </div>
   
</div>

@endsection