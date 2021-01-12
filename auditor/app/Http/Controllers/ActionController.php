<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Acties;

class ActionController extends Controller
{
    public function getAction(){
        
                // db data
                $userId = Auth::id(); 
                $role = DB::table('roles')->where('user_id', $userId)->value('role');
                $_SESSION['role'] = $role; // set a session for easier use

                $actionID = $_GET['id'];

                // $action = DB::table('actie')->where('id', $actionID)->first();
                $action = DB::table('acties')
                ->join('sector', 'acties.sector_id' ,'=', 'sector.id' )
                ->join('risicosoort', 'acties.risicosoort_id', '=', 'risicosoort.id')
                ->join('risicoclassificatie', 'acties.risicoclassificatie_id', '=', 'risicoclassificatie.id')
                ->join('users', 'acties.probleem_eigenaar_id', '=', 'users.id')
                ->join('status', 'acties.status_id', '=', 'status.id')->where('acties.id', $actionID)->first();

                return view('action_owner.action', [
                    'action' => $action
                ]);
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

    public function PE_showAction($id) {
        // query breaks when status_id == null?
        $action = DB::table('actie')
        ->join('sector', 'actie.sector_id' ,'=', 'sector.id' )
        ->join('risicosoort', 'actie.risicosoort_id', '=', 'risicosoort.id')
        ->join('risicoclassificatie', 'actie.risicoclassificatie_id', '=', 'risicoclassificatie.id')
        ->join('users', 'actie.probleem_eigenaar_id', '=', 'users.id')
        ->join('status', 'actie.status_id', '=', 'status.id')
        ->where('actie.id', $id)->get();

        $actionOwner = DB::table('actie')->join('users', 'actie.actie_eigenaar_id', '=', 'users.id')->where('actie.id', $id)->first();
        
        return view('problem_owner.action', [
            'action' => $action,
            'actionOwner' => $actionOwner

        ]);;
    }

    public function sendAction(Request $request){
        // send action from problem_owner to action_owner

        // checks if any action is checked in checkbox
        if (isset($request->actions)) {
            $action_owner_id = $request->input('actie_eigenaar_id');

            $send_action = DB::table('acties')->where('id', $request->actions)
                                             ->update(['actie_eigenaar_id' => $action_owner_id]);
        }

        return redirect('dashboard');
    }   

    public function sendedActions(){
                $id = Auth::id(); 

                // shows all actions sended by the problem_owner to an action_owner with their info.
                $actions = DB::table('acties')
                ->where('probleem_eigenaar_id', $id)
                ->join('users', 'users.id', '=', 'acties.actie_eigenaar_id')
                ->select('users.name', 'acties.*')
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

    }

    public function createAction() {

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


public function saveAction(Request $request) {
    //$actie = DB::table('actie');
    $acties = Acties::create([
        'datum_ontstaan' => $request->datum_ontstaan,
        'bron_detail' => $request->bron_detail,
        'audit_oordeel_ia' => $request->audit_oordeel_ia, 
        'proces' => $request->proces, 
        'nr_bevindingen' => $request->nr_bevindingen, 
        'omschrijving' => $request->omschrijving, 
        'situatie' => $request->situatie, 
        'risico_beschrijving' => $request->risico_beschrijving, 
        'oorzaak' => $request->oorzaak, 
        'aanbeveling_internal_audit' => $request->aanbeveling_internal_audit, 
        'management_actie_plan' => $request->management_actie_plan, 
        'datum_deadline' => $request->datum_deadline, 
        'deadline_bijgesteld' => $request->deadline_bijgesteld, 
        'datum_gesloten' => $request->datum_gesloten, 
        'voortgang' => $request->voortgang, 
        'aantekening_ia' => $request->aantekening_ia, 
        'oordeel_ia' => $request->oordeel_ia, 
        'sector_id' => $request->sector_id, 
        'risicosoort_id' => $request->risicosoort_id, 
        'risico_beschrijving' => $request->risico_beschrijving, 
        'status_id' => $request->status_id
        ]);
    
}

}
