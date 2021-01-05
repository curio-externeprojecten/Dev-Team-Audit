<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    public function getAction(){
                // db data
                $userId = Auth::id(); 
                $role = DB::table('roles')->where('user_id', $userId)->value('role');
                $_SESSION['role'] = $role; // set a session for easier use

                $actionID = $_GET['id'];

                $action = DB::table('actie')
                ->join('sector', 'actie.sector_id' ,'=', 'sector.id' )
                ->join('risicosoort', 'actie.risicosoort_id', '=', 'risicosoort.id')
                ->join('risicoclassificatie', 'actie.risicoclassificatie_id', '=', 'risicoclassificatie.id')
                ->join('users', 'actie.probleem_eigenaar_id', '=', 'users.id')
                ->where('actie.id', $actionID)->get();

                $actionOwner = DB::table('actie')->join('users', 'actie.actie_eigenaar_id', '=', 'users.id')->where('actie.id', $actionID)->get();
                
                return view('action_owner.action', [
                    'action' => $action,
                    'actionOwner' => $actionOwner
           
                ]);;
    }

    public function received() {
        // get id & get the data from the database
        $id = Auth::id();
        $actions = DB::table('actie')
        ->join('users', 'actie.actie_eigenaar_id', '=', 'users.id')
        ->join('risicosoort', 'actie.risicosoort_id', '=', 'risicosoort.id')
        ->select('actie.*', 'users.name', 'actie.actie-eigenaar_status as status', 'risicosoort.primair')
        ->where('probleem_eigenaar_id', $id)
        ->where('actie-eigenaar_status', "AE-afgerond")
        ->get();

        return view('problem_owner.received_actions', ['actions' => $actions]);
    }

    public function PE_actionReceiver(Request $request) {
        // using request for clearer overview
        // set the id & what is changing
        $id = $request->input('action_checkbox');
        $change = $request->input('opmerking_action');
        $btn = "passed";
        
        // check what button is pressed
        if (isset($_POST['btnFailed'])) {
            $btn = "failed";
        }

        // updates
        if($btn == "passed"){
            $data = $request->input('opmerking');
            $affected = DB::table('actie')
              ->where('id', $id)
              ->update(['opmerking_probleem_eigenaar' => $change, 'probleemeigenaar_status' => "PE-afgerond", 'actie-eigenaar_status' => NULL]);
        }
        else if ($btn == "failed"){
            $affected = DB::table('actie')
              ->where('id', $id)
              ->update(['actie-eigenaar_status' => "AE-teruggestuurd"]);
        }
        
        return redirect()->action([ActionController::class, 'received']);
    }

    public function sendAction(Request $request){
        // send action from problem_owner to action_owner

        // checks if any action is checked in checkbox
        if (isset($request->actions)) {
            $action_owner_id = $request->input('actie_eigenaar_id');

            $send_action = DB::table('actie')->where('id', $request->actions)
                                             ->update(['actie_eigenaar_id' => $action_owner_id]);
        }

        return redirect('dashboard');
    }   

    public function sendedActions(){
                $id = Auth::id(); 

                // shows all actions sended by the problem_owner to an action_owner with their info.
                $actions = DB::table('actie')
                ->where('probleem_eigenaar_id', $id)
                ->join('users', 'users.id', '=', 'actie.actie_eigenaar_id')
                ->select('users.name', 'users.id', 'actie_eigenaar_id', 'omschrijving')
                ->get();

                return view('problem_owner.sended_actions', [
                    'actions' => $actions
                ]);;
    }   

    public function createActionPage(){
        $sectors = DB::table('sector')->get();
        $risicosoorten = DB::table('risicosoort')->get();
        $risicoclassificaties = DB::table('risicoclassificatie')->get();
        $users = DB::table('users')->where('name')->get();
        $statussen = DB::table('status')->get();

        return view('auditor.create_action' , [
            'sectors' => $sectors,
            'risicosoorten' => $risicosoorten,
            'risicoclassificaties' => $risicoclassificaties,
            'users' => $users,
            'statussen' => $statussen
        ]);
    }
}
