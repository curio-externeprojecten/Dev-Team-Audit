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

                $action = DB::table('actie')->where('id', $actionID)->get();

                return view('action_owner.action', [
                    'action' => $action
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
}
