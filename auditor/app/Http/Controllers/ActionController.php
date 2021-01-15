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

                $action = DB::table('acties')->select('*', 'acties.id as actie_id')
                ->join('sector', 'acties.sector_id' ,'=', 'sector.id' )
                ->join('risicosoort', 'acties.risicosoort_id', '=', 'risicosoort.id')
                ->join('risicoclassificatie', 'acties.risicoclassificatie_id', '=', 'risicoclassificatie.id')
                ->join('users', 'acties.probleem_eigenaar_id', '=', 'users.id')
                ->leftJoin('status', 'acties.status_id', '=', 'status.id')->where('acties.id', $actionID)->first();
            
                return view('action_owner.action', [
                    'action' => $action
                ]);
    }

    public function received() {
        // get id & get the data from the database
        $id = Auth::id();
        $actions = DB::table('acties')
        ->join('users', 'acties.actie_eigenaar_id', '=', 'users.id')
        ->join('risicosoort', 'acties.risicosoort_id', '=', 'risicosoort.id')
        ->select('acties.*', 'users.name', 'acties.actie_eigenaar_status as AE_status', 'acties.probleemeigenaar_status as PE_status', 'risicosoort.primair')
        ->where([
            ['probleem_eigenaar_id', $id],
            ['probleemeigenaar_status', 'PE-teruggestuurd'],
        ])->orWhere([
            ['probleem_eigenaar_id', $id],
            ['actie_eigenaar_status', 'AE-afgerond'],
        ])->get();

        return view('problem_owner.received_actions', ['actions' => $actions]);
    }

    public function PE_actionReceiver(Request $request) {
        // check to see if we come from received or 
        // if the problem owner makes his own action
        if (null !== $request->input('action_checkbox')){
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
                $affected = DB::table('acties')
                ->where('id', $id)
                ->update(['opmerking_probleem_eigenaar' => $change, 'probleemeigenaar_status' => "PE-afgerond", 'actie_eigenaar_status' => NULL]);
            }
            else if ($btn == "failed"){
                $affected = DB::table('acties')
                ->where('id', $id)
                ->update(['opmerking_probleem_eigenaar' => $change, 'actie_eigenaar_status' => "AE-teruggestuurd"]);
            }
            
            return redirect()->action([ActionController::class, 'received']);
        }
        else {
            $id = $request->input('action_id');
            $affected = DB::table('acties')
            ->where('id', $id)
            ->update(['probleemeigenaar_status' => "PE-afgerond", 'actie_eigenaar_status' => NULL]);

            return redirect()->route('dashboard');
        }
        
    }

    public function PE_showAction($id) {
        // query breaks when status_id == null?
        $action = DB::table('acties')
        ->join('sector', 'acties.sector_id' ,'=', 'sector.id' )
        ->join('risicosoort', 'acties.risicosoort_id', '=', 'risicosoort.id')
        ->join('risicoclassificatie', 'acties.risicoclassificatie_id', '=', 'risicoclassificatie.id')
        ->join('users', 'acties.probleem_eigenaar_id', '=', 'users.id')
        ->where('acties.id', '=', $id)->first();

        $actionOwner = DB::table('acties')->join('users', 'acties.actie_eigenaar_id', '=', 'users.id')->where('acties.id', $id)->get();
        
        return view('problem_owner.action', [
            'action' => $action,
            'actionOwner' => $actionOwner

        ]);
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
                ]);
    }   

    public function createAction() {
        $sectors = DB::table('sector')->get();
        $risicosoorten = DB::table('risicosoort')->get();
        $risicoclassificaties = DB::table('risicoclassificatie')->get();
        $users = DB::table('users')->get();
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
            'aantekening_ia' => $request->aantekening_ia, 
            'sector_id' => $request->sector_id, 
            'risicosoort_id' => $request->risicosoort_id, 
            'risico_beschrijving' => $request->risico_beschrijving, 
            'status_id' => $request->status_id,
            'risicoclassificatie_id' => $request->risicoclassificatie_id,
            'probleem_eigenaar_id' => $request->probleem_eigenaar_id
        ]);

        DB::table('actie_link')->insert([
            'actie_id' => $acties->id,
            'aanmaker_id' => Auth::id()
        ]);
        return redirect('dashboard');
    }   

    // Method to update an comment to an action (ACTION OWNER COMMENT)

    public function UpdateComment(Request $request, $id){
        // $id = $request->input('action_id');
        $data = $request->input('comment_action');

        //$action = DB::table('actie')->where('id', $id);
        //$data = $request->input('progress_action');
        DB::table('acties')
        ->where('id', $id)
        ->update(['opmerking_actie_eigenaar' => $data]);
        
        // return view("action_owner.a
        return redirect()->back();
    }

    public function AU_received() {
        // get id & get the data from the database
        $id = Auth::id();
        $actions = DB::table('acties')
        ->leftJoin('users', 'acties.actie_eigenaar_id', '=', 'users.id')
        ->leftJoin('actie_link', 'acties.id', '=', 'actie_link.actie_id')
        ->leftJoin('risicosoort', 'acties.risicosoort_id', '=', 'risicosoort.id')
        ->select('actie_link.actie_id', 'actie_link.aanmaker_id','acties.*', 'users.name', 'acties.probleemeigenaar_status as PE_status', 'risicosoort.primair')
        ->where('actie_link.aanmaker_id', $id)
        ->where('acties.probleemeigenaar_status', 'PE-afgerond')
        ->get();

        return view('auditor.received_actions', ['actions' => $actions]);
    }

    public function AU_actionReceiver(Request $request) {
        // using request for clearer overview
        // set the id & what is changing
        $id = $request->input('action_checkbox');
        $change = $request->input('opmerking_action');
        $change_oordeel = $request->input('oordeel_action');
        $now = date('Y-m-d H:i');
        $btn = "passed";
        
        // check what button is pressed
        if (isset($_POST['btnFailed'])) {
            $btn = "failed";
        }

        // updates
        if($btn == "passed"){
            $data = $request->input('opmerking');
            $affected = DB::table('acties')
              ->where('id', $id)
              ->update(['opmerking_audit' => $change, 'oordeel_ia' => $change_oordeel, 'au_status' => "AU-afgerond", 'probleemeigenaar_status' => null, 'datum_gesloten' => $now]);
        }
        else if ($btn == "failed"){
            $affected = DB::table('acties')
              ->where('id', $id)
              ->update(['opmerking_audit' => $change, 'oordeel_ia' => $change_oordeel, 'probleemeigenaar_status' => "PE-teruggestuurd"]);
        }
        
        return redirect()->route('AU_received');
    }

    public function AU_showAction($id) {
        // query breaks when status_id == null?
        $action = DB::table('acties')
        ->join('sector', 'acties.sector_id' ,'=', 'sector.id' )
        ->join('risicosoort', 'acties.risicosoort_id', '=', 'risicosoort.id')
        ->join('risicoclassificatie', 'acties.risicoclassificatie_id', '=', 'risicoclassificatie.id')
        ->join('users', 'acties.probleem_eigenaar_id', '=', 'users.id')
        ->where('acties.id', '=', $id)->first();

        $actionOwner = DB::table('acties')->join('users', 'acties.actie_eigenaar_id', '=', 'users.id')->where('acties.id', $id)->get();
        
        return view('auditor.actions', [
            'action' => $action,
            'actionOwner' => $actionOwner
        ]);
    }

    public function AU_showClosedActions() {
        // get id & get the data from the database
        $id = Auth::id();
        $actions = DB::table('acties')
        ->leftJoin('users', 'acties.actie_eigenaar_id', '=', 'users.id')
        ->leftJoin('actie_link', 'acties.id', '=', 'actie_link.actie_id')
        ->leftJoin('risicosoort', 'acties.risicosoort_id', '=', 'risicosoort.id')
        ->select('actie_link.actie_id', 'actie_link.aanmaker_id','acties.*', 'users.name', 'acties.probleemeigenaar_status as PE_status', 'risicosoort.primair')
        ->where('actie_link.aanmaker_id', $id)
        ->where('acties.au_status', 'AU-afgerond')
        ->get();

        return view('auditor.closed_actions', ['actions' => $actions]);
    }
}
