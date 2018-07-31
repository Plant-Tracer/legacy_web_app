<?php

namespace App\Http\Controllers;

use App\User;
use App\Trait;
use DB;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{

    public function store(Request $request){

    	$validator = Validator::make($request->all(), [

    		'email' => 'bail|required|unique:users|max:255',
    		
    		'password'=> 'bail|required|min:6|confirmed',

    		'password_confirmation' => 'bail|required|min:6'
    	]);

    	  if($validator->fails()){

    	  	$errors = $validator->errors();

    	  	foreach ($errors->all() as $message){
    	  		return back()->with('alert', $message);
    	  	}

    	    }

		if(DB::table('plant_tracing')->where('researcher','=',request(['email']))->exists()){

			$newUser = User::create(request(['email','password']));

			//Sign user in
    		auth()->login($newUser);

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

            //redirect to the database page
            return view('database',compact('users'));

		}

		else{
		
			return back()->with('alert','Please make sure you have already registered in the Plant Tracer app');
		}

    }

}
