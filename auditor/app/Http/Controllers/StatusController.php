<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    function FinishAction(Request $request){
       
        
        $id = $request->input('action_id');
       //$action = DB::table('actie')->where('id', $id);
        //  $data = $request->input('finish_action');
        // //  $change = DB::table('actie')
        // //   ->where('id', $id)
        // //   ->update(['voortgang' => $data]);

         $secondChange = DB::table('acties')->where('id', $id)->update(['actie_eigenaar_status' => 'AE-afgerond']); // Update the status to send the action to the problem owner

        // return view("action_owner.action?id='$id'");
        return redirect()->action([DashboardController::class, 'dashboard']);
    }
}
