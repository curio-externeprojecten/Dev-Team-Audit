<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
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
   public function dashboard()
   {
        // db data
        $id = Auth::id(); 
        $role = DB::table('roles')->where('user_id', $id)->value('role');
        $_SESSION['role'] = $role; // set a session for easier use

        // Check if id exists
        if($id){
            // Check what role the user has so we can relocate him to the right dashboard
            if( $role == "Auditor" ){
                return view('auditor.dashboard');
            }
            elseif ( $role == "Probleem Eigenaar" ){
                return view('problem_owner.dashboard');
            }
            else {
                return view('action_owner.dashboard');
            }
        }
        // if id does not exist then no-one is logged in
        else {
            return view('auth.login');
        }
   }
}
