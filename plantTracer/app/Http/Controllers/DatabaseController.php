<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Lava;
use JavaScript;

class DatabaseController extends Controller
{
    /*
    public function __construct(){

        $this->middleware('auth');

    }
    */

    public function index(){

    	if(Auth::check()){

    		$userEmail = Auth::user()->email;
    	
    		$users = DB::table('plant_tracing')->where('researcher', '=',$userEmail)->get();

    		
    		foreach($users as $user){

    		$xAxis = explode(',',$user->graphTime);
    		$graphOnePoints = explode(',',$user->graphX);
    		$graphTwoPoints = explode(',',$user->graphY);

    		    JavaScript::put([
    				'xAxis' => $xAxis,
    				'graphOnePoints' => $graphOnePoints,
    				'graphTwoPoints' => $graphTwoPoints

    			]);

            return view('database', compact('users'));
    		}

    		}

    	else{
    		return back()->with('alert', 'You must be logged in to access this page!');
    		}
    	}

    	}
