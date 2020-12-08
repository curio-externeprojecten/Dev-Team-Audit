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
}
