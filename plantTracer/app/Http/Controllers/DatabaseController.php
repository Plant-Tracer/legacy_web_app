<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use JavaScript;

class DatabaseController extends Controller
{



    public function index(){

    	if(Auth::check()){

    		$userEmail = Auth::user()->email;

            $users = DB::table('plant_tracing')->where('researcher', '=',$userEmail)->get();

            $count = count($users);
    	
    		$prefilledUserData = DB::table('plant_tracing')->where('researcher', '=',$userEmail)->first();

            $isLoggedIn = true;

            if($count > 0){

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
                    'users' => $users,
                    'isLoggedIn' => $isLoggedIn

                ]);
            }

            else{
                JavaScript::put([
                    'researcher' => $userEmail
                ]);
            }

            return view('database', compact('users','count'));
    		}

            else{
                return back()->with('alert', 'You must be logged in to access this page!');
            }

    		}

    public function update(Request $request){

        $filter = request('filter');

        $userEmail = Auth::user()->email;

        if($filter == 'otherData'){

            $users = DB::table('plant_tracing')->where('researcher', '!=',$userEmail)->get();

            $prefilledUserData = DB::table('plant_tracing')->where('researcher', '=',$userEmail)->first();

            $isLoggedIn = true;

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
                'users' => $users,
                'isLoggedIn' => $isLoggedIn

                ]);
        }

        else{
        }

        return $this->index();

    }

}

