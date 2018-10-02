<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Gate;
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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if(!Gate::allows('isAdmin')){
           // $request->user()->token()->revoke();
           Auth::logout();
           return redirect()->back()->with('alert', 'Anda Bukan Admin!');
        }else{
        $users = User::orderBy('id','DESC')->get();
        return view('backend/home', compact('users'));}
    }

}
