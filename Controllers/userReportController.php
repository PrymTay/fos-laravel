<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\food_order;
use App\Models\User;
use App\Models\order;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;

class userReportController extends Controller
{
    public function userReportIndex( Request $request){
        $userID = Auth::user()->id;
        if($request->ajax()){
            if (!empty($_POST['endDate']) && !empty($_POST['startDate'])) {		
                $endDate = $_POST['endDate'];
                $startDate   = $_POST['startDate'];
               
                //echo($userID);
               // echo route('adminExpenditure');
                echo ($startDate);
                echo ($endDate);
                $array = [];
                $query = DB::table('users')
                ->join('food','food.id','=','food_order.food_id')
                ->join('orders','orders.id','=','food_order.order_id')
                ->join('users','users.id','=','orders.user_id')
                ->select('food_order.order_id', DB::raw('SUM(food.price) as total'),'orders.created_at','orders.user_id','users.firstname')
                ->groupBy('order_id')
               // ->orderBy('order_id')
                ->where('users.id',$userID)
                ->whereBetween('created_at',['2021-09-05','2021-09-08']);
        
                return datatables($query)->make(true);
            
    
            } 
            
            else{
                $query = DB::table('users')
                ->join('food','food.id','=','food_order.food_id')
                ->join('orders','orders.id','=','food_order.order_id')
                ->join('users','users.id','=','orders.user_id')
                ->select('food_order.order_id', DB::raw('SUM(food.price) as total'),'orders.created_at','orders.user_id','users.firstname')
                ->groupBy('order_id')
                ->where('users.id',$userID);
                
                return Datatables($query)->make(true);               
            
            }
            if($query->count()>0){
                $data = array();            
                $sub_array = array();    
                foreach ($query as $item){
                    $sub_array[] = $item->firstname;
                    $sub_array[] = $item->total;
                    $sub_array[] = $item->order_id;
                    $sub_array[] = $item->created_at;
                    $sub_array[] = $item->user_id;              
                echo ($item) ;
            }   
                        
                $data[] = $sub_array;
                $output = array(          
                   "data"    => $data
                   );
                   array_multisort($output);
            }
            else {
                echo ("No data found");
            }
                
                           
       }
       return view ('user.userReport');
    }

    public function recentOrders( Request $request){
        $userID = Auth::user()->id;
        if ($request->ajax()){
            $query = DB::table('food_order')
          
            ->join('food','food.id','=','food_order.food_id')
            ->join('orders','orders.id','=','food_order.order_id')
            //->join('food_order','orders.id','=','food_order.order_id')
            ->select('orders.id','orders.created_at','food.price','food.name')
            // ->groupBy('order_id')
            ->where('user_id',$userID)
            ->orderBy('created_at','desc')
            ->limit(10);
           
            return datatables($query)->make(true);
        }
        return view ('user.userHome');

        //return view ('user.userHome',["query"=>$query]);
    }
}
