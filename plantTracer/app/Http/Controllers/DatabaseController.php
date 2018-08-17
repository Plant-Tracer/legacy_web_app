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
    	
    		$prefilledUserData = DB::table('plant_tracing')->where('researcher', '=',$userEmail)->first();

    		$xAxis = explode(',',$prefilledUserData->graphTime);
    		$graphOnePoints = explode(',',$prefilledUserData->graphX);
    		$graphTwoPoints = explode(',',$prefilledUserData->graphY);
            $researcher = $prefilledUserData->researcher;
            $movement = $prefilledUserData->movement;
            $genotype = $prefilledUserData->gene;
            $geneID = $prefilledUserData->geneID;
            $date = $prefilledUserData->dateLogged;

    		    JavaScript::put([
    				'xAxis' => $xAxis,
    				'graphOnePoints' => $graphOnePoints,
    				'graphTwoPoints' => $graphTwoPoints,
                    'researcher' => $researcher,
                    'movement' => $movement,
                    'genotype' => $genotype,
                    'geneID' => $geneID,
                    'date' => $date,
                    'users' => $users

    			]);

            return view('database', compact('users'));
    		}

            else{
                return back()->with('alert', 'You must be logged in to access this page!');
            }

    		}

    	}

