@extends('layouts.header')
@section('content')
<style>
  .myCart{
   color: #ffc233;
   background: #ffe8b3;
  }
  .cart{
    display: inline-block;
  font-size: 32px;
  height: 50px;
  width: 50px;
  background: #cce5ff;
  line-height: 50px;
  text-align: center;
  color: #66b0ff;
  border-radius: 12px;
  margin: -15px 0 0 6px;
  }
 .myIndicator{
  display: flex;
  align-items: center;
 }
 .myIndicator i{
  height: 20px;
  width: 20px;
  background: #8FDACB;
  line-height: 20px;
  text-align: center;
  border-radius: 50%;
  color: #fff;
  font-size: 20px;
  margin-right: 5px;
 }
 .myNumber{
  display: inline-block;
  font-size: 35px;
  margin-top: -6px;
  font-weight: 500;
 }
 .myBox{
 
  background: #fff;
  padding: 15px 14px;
  border-radius: 10px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.1);
 }
 </style>
    <link rel="stylesheet" href="css/sb-admin-2.min.css">
    <link rel="stylesheet" href="css/sb-2.css">
  

                  <div class="row" style="color: black">

                      <!-- Menu -->
                      <div class="col-xl-3 col-md-6 mb-4">
                          <div class="card border-left-primary shadow h-100 py-2">
                              <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                      <div class="col mr-2">
                                        <div class="myBx">
                                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Menu</div>
                                        {{-- <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div> --}}
                                        <p class="card-text" >To edit,add and view menu items, click the button.</p>
                                        <a href="{{ route('food.index') }}" class="btn btn-success"> Menu</a>
                                        </div>
                                         
                                      </div>
                                      <div class="col-auto">
                                          <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <!-- Users -->
                      <div class="col-xl-3 col-md-6 mb-4">
                          <div class="card border-left-success shadow h-100 py-2">
                              <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                      <div class="col mr-2">
                                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                              Users</div>
            
                                              <p class="card-text">To edit,add and view users of the system, click the button.</p>
                                              <a href="{{ route('users.index') }}" class="btn btn-success"> Users</a>
                                      </div>
                                      <div class="col-auto">
                                          <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          
                      </div>

                      <!-- Total users -->
                      <div class="col-xl-3 col-md-6 mb-4">
                          <div class="card border-left-info shadow h-100 py-2">
                              <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                      <div class="col mr-2">
                                          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total users
                                          </div>
                                          <div class="myox">
                                            <div class="right-side">
                                              <div class="myNumber">
                                                @php
                                                use App\Models\User;
                                                     $users = User::all();
                                                     $usersCount = User::where('is_admin','=','0')->count();
                                                     echo ($usersCount);
                                                @endphp
                                            </div>
                                            <span class="float-right"><i class='bx bxs-user cart myCart' ></i></span>
                                            <p>Current number of users</p>
                                            </div>
                                          
                                     
                                      </div>
                                     
                                      </div>
                                      </div>
                                      <div class="col-auto">
                                          <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>

                             <!-- Total Orders-->
                       <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Orders
                                        </div>
                                        <div class="myBx">
                                          <div class="right-side">
                                            <div class="myNumber">
                
                                              @php
                                              use App\Models\order;
                                                   $ordersCount = order::all()->count();
                                                   //$ordersCount = order::where('is_admin','=','0')->count();
                                                   echo ($ordersCount);
                                              @endphp 
                                          </div>
                                          <span class="float-right"> <i class='bx bxs-dish cart myCart' ></i></span>
                                          <br/>
                                          
                                          <p>Current number of orders</p>
                                        </div>
                                                      
                                          
                                        </div>
                                 
                                    </div>
                                </div>
                            </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
  
                      </div>

                    
        </div>
      </div>
        
    </div>
   
</div>

  

{{-- 

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
     
    <div class="overview-boxes">
        
      <div class="box">
          <div class="right-side">
   
              <div class="box-topic">MENU</div>
              <p class="card-text">To edit,add and view menu items, click the button.</p>
              <a href="{{ route('food.index') }}" class="btn btn-success"> Menu</a>
      
          </div>
        </div>       
            
          <div class="box">
              <div class="pull-left">
                <div class="box-topic">USERS</div>
               
              <p class="card-text">To edit,add and view users of the system, click the button.</p>
              <a href="{{ route('users.index') }}" class="btn btn-success"> Users</a>
                
              </div>
          
               
              </div>
          </div>
  </div>
  
    {{-- <div class="overview-boxes">
        
            <div class="box">
                <div class="right-side">
                  <div class="box-topic">Total Users</div>
                  <div class="number">
    
      <div class="row">
        <div class="col-sm-6">
          
              <h5 class="card-title">USERS</h5>
              <p class="card-text">To edit,add and view users of the system, click the button.</p>
              <a href="{{ route('users.index') }}" class="btn btn-success"> Users</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          
              <h5 class="card-title">MENU</h5>
              <p class="card-text">To edit,add and view menu items, click the button.</p>
              <a href="{{ route('food.index') }}" class="btn btn-success"> Current Menu</a>
            </div>
          </div> --}}
        </div>
      </div>
        
    </div>
   
</div>

   


@endsection