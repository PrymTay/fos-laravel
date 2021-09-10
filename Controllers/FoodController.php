<?php

namespace App\Http\Controllers;
use App\Models\food;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class FoodController extends Controller
 {
//     /**
//      * Display a listing of the resource.
//      *
//      * @return \Illuminate\Http\Response
//      */

    public function index()

    {
        $menuItem = food::all();
        // $i =0;
        // $menuItem = ['one'=>"1",
        // "two" => "2","twoo" => "2","three" => "3","four" => "4"];

        return view('menu.index', ["menuItem" => $menuItem]);
       
    }

   
     /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
     protected function validator(array $data){
        return Validator::make($data,[
            'name' =>['required','string'],
            'price' =>['required','double'],
        ]);
     }


     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // /**
    //  * Create a new user instance after a valid food addition.
    //  *
    //  * @param  array  $data
    //  * @return \App\Models\food
    //  */
    protected function create()
    {
        return view('menu.createMenu');

        // return food::create([
        //     'name' => $data['name'],
        //     'price' => $data['price'],
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);
  
        food::create($request->all());
   
        return redirect()->route('food.index')
                        ->with('success','food added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menuItem = food::find($id);
        return view('menu.showMenu',compact('menuItem'));
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */

    


    public function edit($id)
    {
        $menuItem = food::find($id);

        return view('menu.editMenu',compact('menuItem','id'));
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

        
        $menuItem = food::find($id);
        $menuItem->name = request('name');
        $menuItem->price = request('price');
        $menuItem->save();
                $request->validate([
                'name' => 'required',
                'price' => 'required',
         ]);
        $menuItem->update($request->all());
  
        return redirect()->route('food.index')
                        ->with('success','menu details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        food::find($id)->delete();
  
        return redirect()->route('food.index')
                        ->with('success','Food item deleted successfully');
    }
}
