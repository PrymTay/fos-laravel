<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\food;

use Illuminate\Support\Facades\Auth;
use App\Models\order;
use App\Models\food_order;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function index()
    {
        //dd(food::all());

        //accessing the model(food)
        $menuTable = food::all();

        return view ('order.index',["menuTable" => $menuTable]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
        
        $total = $_POST['total'];
        $food_IDS = $_POST['food_ids'];
       // echo ($food_IDS);
        
          $userID =   Auth::user()->id;
         
    //     // 
    //     //  echo ($food_ids_string);

    
         
     //$orderRecord = order::firstOrCreate(['user_id'=>$userID]);

           //$lastId = $orderRecord->id;
           //echo ($lastId);
        //  return redirect()->route('order.index')
        //  ->with('success','food recorded');

     
        
    //      $food_ids_string = json_decode($food_IDS, true);
        
    // $total==null ? redirect()->route('order.index')->with('danger','Order can not be empty')
    //              : $orderRecord =  order::create(['user_id' => $userID]);
    //                $lastId = $orderRecord->id;
    //                redirect()->route('order.index')->with('success','Your Order was successfully recorded');
                 

         if ($total==null) {
            
             return redirect()->route('order.index')
                    ->with('danger','Order can not be empty');
             
          }
         else
          {
             $orderRecord =  order::create(['user_id' => $userID]);
             
                $lastId = $orderRecord->id;
                $food_ids_string = json_decode($food_IDS,true);

                foreach ($food_ids_string as $value) {
                    echo ($value);
                    //echo gettype($value);
                    // DB::insert('insert into food_order (order_id, food_id) values (?, ?)', [$lastId, $value]);
    
                    $orderDetailsRecord = food_order::create(['order_id'=>$lastId,
                                        'food_id'=>$value]);
                    //$orderDetailsRecord = DB::table('food_order')->insert(['order_id'=>$lastId,'food_id'=>$value]);
             //}
            //}
            // else {

                //return redirect()->route('order.index')
                  //             ->with('danger','Your Order was not recorded, Try again');
             }
            

          
          
                //   $orderDetailsRecord = food_order::create(['order_id'=>$lastId,
                //                         'food_id'=>$value]);
                                       
           if($orderDetailsRecord){
                        return redirect()->route('order.index')
                               ->with('success','Your Order was successfully recorded');
                //    } 
                //   else {
                //       echo ("error occured");
                //   }
                
                // $sql_qry = "INSERT INTO order_foods(order_id,food_id) VALUES ('$lastId','$value')";
                // if (mysqli_query($conn, $sql_qry)) {
                //  
                // }
                // else {
                //   echo "failed to register order";
                 }
              }
        
            //  return redirect()->route('order.index')
            //         ->with('success','Your Order was successfully recorded');
      //}
        
     
   
    }
       
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	/**
	 */
	function __construct() {
	}
}
