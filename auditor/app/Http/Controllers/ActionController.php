<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Actie;

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
    public function createAction() {

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


public function saveAction(Request $request) {
    //$actie = DB::table('actie');
    $actie = Actie::create([
        'create_date' => $request->create_date,
        'bron_detail' => $request->bron_detail,
        'audit_oordel' => $request->audit_oordel, 
        'process' => $request->process, 
        'nummer_bevinding' => $request->nummer_bevinding, 
        'omschrijving_bevinding' => $request->omschrijving_bevinding, 
        'probleem' => $request->probleem, 
        'risico_beschrijving' => $request->risico_beschrijving, 
        'oorzaak' => $request->oorzaak, 
        'aanbeveling_ia' => $request->aanbeveling_ia, 
        'map' => $request->map, 
        'datum_deadline' => $request->datum_deadline, 
        'datum_bijgesteld' => $request->datum_bijgesteld, 
        'datum_gesloten' => $request->datum_gesloten, 
        'voortgang' => $request->voortgang, 
        'aantekeningen_ia' => $request->aantekeningen_ia, 
        'oordeel_ia' => $request->oordeel_ia, 
        'sector' => $request->sector, 
        'pr' => $request->pr, 
        'sr' => $request->sr, 
        'arc' => $request->arc, 
        'orc' => $request->orc, 
        'grc' => $request->grc, 
        'status' => $request->status, 
        'sub_status' => $request->sub_status
        ]);
    
}

}
