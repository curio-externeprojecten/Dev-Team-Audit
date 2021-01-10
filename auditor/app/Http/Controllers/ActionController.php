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
        ->join('status', 'actie.status_id', '=', 'status.id')
        ->select('actie.*', 'status.status', 'status.substatus')
        ->where('probleem_eigenaar_id', $id)
        ->where('status.status', 'Afgerond')
        ->get();

        return view('problem_owner.received_actions', ['actions' => $actions]);
    }

    public function action(Request $request) {
        // using request for clearer overview
        // set the id & what is changing
        $id = $request->input('action_checkbox');
        $change = $request->input('opmerking_action');
        
        // check what button is pressed
        if (isset($_POST['btnFailed'])) {
            $btn = "failed";
        } else {
            $btn = "passed";
        }

        // updates
        if($btn == "passed"){
            $data = $request->input('opmerking');
            $affected = DB::table('actie')
              ->where('id', $id)
              ->update(['opmerking_probleem_eigenaar' => $change, 'status_id' => 4]);
        }
        else if ($btn == "failed"){
            $affected = DB::table('actie')
              ->where('id', $id)
              ->update(['status_id' => 3]);
        }
        
        return redirect()->action([ActionController::class, 'received']);
    }
    public function createAction(Request $request) {

    
        $sectors = \DB::table('sector')->get();
        $risicosoorten = \DB::table('risicosoort')->get();
        $risicoclassificaties = \DB::table('risicoclassificatie')->get();
        $users = \DB::table('users')->where('name')->get();
        $statussen = \DB::table('status')->get();
    
        return view('auditor.create_action' , [
            'sectors' => $sectors,
            'risicosoorten' => $risicosoorten,
            'risicoclassificaties' => $risicoclassificaties,
            'users' => $users,
            'statussen' => $statussen
        ]);
    

    
}

}
