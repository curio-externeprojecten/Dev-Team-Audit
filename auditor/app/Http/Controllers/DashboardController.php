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
        
      $sectors = DB::table('sector')->get();
      $risicosoorten = DB::table('risicosoort')->get();
      $risicoclassificaties = DB::table('risicoclassificatie')->get();
      $users = DB::table('users')->where('name')->get();
      $statussen = DB::table('status')->get();

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
                    'actions' => $actions,
                    'risicosoorten' => $risicosoorten
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
            if ( $role == "Probleem-Eigenaar" ){
                $actions = DB::table('acties')->select('*')->where('probleem_eigenaar_id', $id)->get();
                return $actions;
            }
            else {  
               // @if($action->actie_eigenaar_status == null || $action->actie_eigenaar_status == 'AE-teruggestuurd')
       
               $actions = DB::table('acties')
               ->join('risicosoort', 'acties.risicosoort_id', '=', 'risicosoort.id')
               ->select('*', 'acties.id as actie_id')
               ->where('actie_eigenaar_id', $id)
               ->where(function ($query) {
                   $query->where('actie_eigenaar_status', '=', 'AE-teruggestuurd')
                           ->orWhere('actie_eigenaar_status', '=', null);
               })->get();

                return $actions;
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
            $change = DB::table('roles')->where('user_id', $id)->update(['role' => $role]); 
        } catch (\Exception $e) {
            return redirect()->action([DashboardController::class, 'dashboard']);
        }
        return redirect()->action([DashboardController::class, 'dashboard']);
    }

}

