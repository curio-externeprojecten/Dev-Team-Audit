<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Psy\Command\WhereamiCommand;
use Symfony\Component\VarDumper\VarDumper;

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

        $actions = $this->getActions();
        $action_owners = $this->getAction_Owners();
        
      $sectors = \DB::table('sector')->get();
      $risicosoorten = \DB::table('risicosoort')->get();
      $risicoclassificaties = \DB::table('risicoclassificatie')->get();
      $users = \DB::table('users')->where('name')->get();
      $statussen = \DB::table('status')->get();

    //   return view('auditor.create_action' , [
    //       'sectors' => $sectors,
    //       'risicosoorten' => $risicosoorten,
    //       'risicoclassificaties' => $risicoclassificaties,
    //       'users' => $users,
    //       'statussen' => $statussen
    //   ]);

        // Check if id exists
        if($id){
            // Check what role the user has so we can relocate him to the right dashboard
            if( $role == "Auditor" ){
                return view('auditor.dashboard');
            }
            elseif ( $role == "Probleem-Eigenaar" ){
                return view('problem_owner.dashboard', [
                    'actions' => $actions,
                    'action_owners' => $action_owners
                ]);
            }
            else {

                return view('action_owner.dashboard', [
                    'actions' => $actions
                ]);
               
            }
        }
        // if id does not exist then no-one is logged in
        else {
            
            return view('auth.login');
            
        }
   }
   

   public function getActions(){
         // db data
         $id = Auth::id(); 
         $role = DB::table('roles')->where('user_id', $id)->value('role');
         $_SESSION['role'] = $role; // set a session for easier use

        if($id){
              // Check what role the user has so we can send all the right actions to the desired person
            if( $role == "Auditor" ){
                
            }
            
            else if ( $role == "Probleem-Eigenaar" ){
                $action = DB::table('actie')->select('*')->where('probleem_eigenaar_id', $id)->get();
                return $action;
            }
            else {
                $action = DB::table('actie')->select('*')->where('actie_eigenaar_id', $id)->get();
                return $action;
            }
         }
    }
   public function getAction_Owners(){
            // check which person has the role actie-eigenaar 
            $action_owners = DB::table('roles')->where('role', 'Actie-Eigenaar')
                                                ->join('users', 'users.id', '=', 'roles.user_id')
                                                ->select('users.name', 'users.id')
                                                ->get();
            return $action_owners;
   }

   public function changeRole($role){
        $id = Auth::id();
        
        try {
            $change = \DB::table('roles')->where('user_id', $id)->update(['role' => $role]); 
        } catch (\Exception $e) {
            return redirect()->action([DashboardController::class, 'dashboard']);
        }
        return redirect()->action([DashboardController::class, 'dashboard']);
    }

}
