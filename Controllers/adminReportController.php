<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\food_order;
use App\Models\User;
use App\Models\order;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;

class adminReportController extends Controller
{
    public function indssex(){
        

        $query = DB::table('food_order')
                    ->join('food','food.id','=','food_order.food_id')
                    ->join('orders','orders.id','=','food_order.order_id')
                    ->join('users','users.id','=','orders.user_id')
                    ->select('food_order.order_id', DB::raw('SUM(food.price) as total'),'orders.created_at','orders.user_id','users.firstname')
                    ->groupBy('order_id')
                    ->get();
        
    }

    public function index(Request $request){
        if( $request->ajax()){
            if (!empty($_POST['endDate']) && !empty($_POST['startDate'])) {		
                $endDate = $_POST['endDate'];
                $startDate   = $_POST['startDate'];
                echo route('adminExpenditure');
                echo ($startDate);
                echo ($endDate);
                $array = [];
                $query = DB::table('food_order')
                            ->join('food','food.id','=','food_order.food_id')
                            ->join('orders','orders.id','=','food_order.order_id')
                            ->join('users','=','orders.user_id')
                            ->select('food_order.order_id',DB::raw('SUM(food.price) as total'),'orders.created_at','orders.user_id','users.firstname')
                            ->whereBetween('created_at',[$startDate,$endDate]);
                            return datatables($query)->make(true);
                   

                // $query = DB::table('food_order')
                // ->join('food','food.id','=','food_order.food_id')
                // ->join('orders','orders.id','=','food_order.order_id')
                // ->join('users','users.id','=','orders.user_id')
                // ->select('food_order.order_id', DB::raw('SUM(food.price) as total'),'orders.created_at','orders.user_id','users.firstname')
                // ->groupBy('order_id')
                // ->whereBetween('created_at',[$startDate,$endDate]);
                // return datatables($query)->make(true);
    
            } 
            else{
                $query = DB::table('food_order')
                ->join('food','food.id','=','food_order.food_id')
                ->join('orders','orders.id','=','food_order.order_id')
                ->join('users','users.id','=','orders.user_id')
                ->select('food_order.order_id', DB::raw('SUM(food.price) as total'),'orders.created_at','orders.user_id','users.firstname')
                ->groupBy('order_id');
    
                return datatables($query)->make(true);
                
            }
           
            $data = array();
    
            $sub_array = array();
    
            foreach ($query as $item){
                $sub_array[] = $item->firstname;
                $sub_array[] = $item->total;
                $sub_array[] = $item->user_id;
                $sub_array[] = $item->created_at;
           
            }
            
            $data[] = $sub_array;
            $output = array(
             
                //  "draw" => intval($_POST['date'] ),
             
                  "data"    => $data
                 );
                 array_multisort($output);
                 //echo json_encode($output);
           // return view ('user.adminReport',["query" => $query]);
           
        }
        return view ('user.adminReport');
        }
       
}
