<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\food;
use App\Models\User;

class AdminController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function index()
    {

        $users = User::all();
        //dd($users);


        return view ('user.team',["users"=>$users]);

        // $users = User:: all()
        // return view('users.index',compact('users'));
        // $users = User::latest()->paginate(5);
  
        // return view('users.index',compact('users'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'phone' =>['required','numeric','min:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
  
        //User::create($request->all());
         User::create([
            'firstname' => $request['firstname'],
            'lastname' =>$request['lastname'],
            'username' => $request['username'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'password' => Hash::make($request['password']),
        ]);
   
        return redirect()->route('users.index')
                        ->with('success','User created successfully.');

        
        
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $users = User::find($id);
        return view('user.show',compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $users = User::find($id);
        return view('user.editUser',compact('users','id'));
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
        $users = User::find($id);
        $users->phone = request('phone');
        $users->email = request('email');
        $users->save();
                $request->validate([
                'phone' => 'required',
                'email' => 'required',
         ]);
        $users->update($request->all());
  
        return redirect()->route('users.index')
                        ->with('success','User data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        User::find($id)->delete();
  
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}
