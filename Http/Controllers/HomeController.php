<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function loggedIn()
    {
        return view('auth.login');
    }

    public function userPage(){
        return view('user');
    }

    public function registeredDisplayMessage(){
        return view ('registered');
    }
    /**
     * method for the admin
     */
    public function adminHome()
    {
        return view('admin');
    }
    public function store(Request $request)
    {
        switch ($request->input('btn')) {
            case 'addItem':
                echo "added item";
                break;
            case 'addUser':
                echo "added user";
                break;
            case 'editMenu':
                echo "menu edited";
                break;
            case 'editUser':
                echo "User edited";
                break;
        
        }
    }
}
