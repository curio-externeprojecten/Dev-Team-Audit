<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProgressController extends Controller
{
    function SendProgress(Request $request, $id){

        
        // $id = $request->input('action_id');
        $data = $request->input('progress_action');

        //$action = DB::table('actie')->where('id', $id);
         //$data = $request->input('progress_action');
         DB::table('acties')
         ->where('id', $id)
         ->update(['voortgang' => $data]);

        // return view("action_owner.action?id='$id'");
        return redirect()->back();
    }
}
