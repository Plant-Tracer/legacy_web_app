<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trait;
use DB;
use Lava;

class SessionsController extends Controller
{
	/*
	public function __construct(){

		$this->middleware('guest', ['except' => 'destroy']);
	}
	*/

    public function store(){

    	if(!auth()->attempt(request(['email','password']))){

    		return back()->with('alert','Please check your credentials and try again.');
    	}

        $users = DB::table('plant_tracing')->where('researcher', '=',request(['email']))->get();

        
            $data = \Lava::DataTable();
            $data->addDateColumn('Day of Month')
                ->addNumberColumn('Projected')
                ->addNumberColumn('Official');

            // Random Data For Example
            for ($a = 1; $a < 20; $a++)
            {
                $rowData = [
                  "2014-8-$a", rand(0.95,2.25), rand(0.95,2.25)
                ];

                $data->addRow($rowData);
            }

            \Lava::LineChart('Stocks', $data, [
              'title' => 'X-axis(Circumnutation)'
            ]);

        
            /*
        $data = \Lava::DataTable();
        $data->addNumberColumn('Accession')->addDateColumn('Day of Month');

        $maxTime = DB::table('plant_tracing')->where('researcher','=',request(['email']))->max('graphX');

        $maxDistance = DB::table('plant_tracing')->where('researcher','=',request(['email']))->max('graphY');

        $minTime = DB::table('plant_tracing')->where('researcher','=',request(['email']))->min('graphX');

        $minDistance = DB::table('plant_tracing')->where('researcher','=',request(['email']))->min('graphY');

        // Random Data For Example
        for ($a = 1; $a < 30; $a++)
        {
            $rowData = [
              rand(800,1000)
            ];

            $data->addRow($rowData);
        }

        \Lava::LineChart('Stocks', $data, [
          'title' => 'Stock Market Trends'
        ]);
        */

        //redirect to the database page
        return view('database',compact('users'));
    }

    public function destroy(){
    	auth()->logout();
    	return redirect()->home();
    }
}
