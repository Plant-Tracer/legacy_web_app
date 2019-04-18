<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;
use JavaScript;

class IndexController extends Controller
{

    public function index(){

    	if(Auth::check()){
    		$isLoggedIn = true;

    		JavaScript::put([
    			'isLoggedIn' => $isLoggedIn
    		]);
    	}

    	return view('/index');
    }

        public function store(Request $request)
    {
        if ($request->has('password_confirmation')) {

            //HANDLE REGISTRATION FORM
            
            return $this->register($request);
        }

        else{

            // HANDLE LOGIN FORM 

            $email = $request->get('email');
            $password = $request->get('password');

            if (Auth::attempt(['email' => $email, 'password' => $password])){
                
                return redirect('database');
            }

            return back()->with('alert', 'Check your credentials and try again!');
        }
    }

        public function register(Request $request){

            $hasApp = request('isDownloaded');

            $validator = \Validator::make($request->all(), [
    
            'email' => ['bail','required','unique:users','max:255'],
            
            'password'=> 'bail|required|min:6|confirmed',

            'password_confirmation' => 'bail|required|min:6',

        ]);

        if ($validator->fails()){

            //return $request;
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

        else{

            if(DB::table('plant_tracing')->where('researcher','=',request(['email']))->exists()){

            /*
            if($hasApp == 'noApp'){
                console.log("No App!");
                DB::table('users')->insert(['downloaded_app'=>'false']);
            }

            else{
                DB::table('users')->insert(['downloaded_app'=>'true']);
            }
            */

            $passwordconf = Hash::make($request->get('password_confirmation'));

            $newUser = new User();
            $newUser->email=$request->get('email');
            $newUser->password=$request->get('password');
            $newUser->password_confirmation=$passwordconf;
            $newUser->save();

            auth()->login($newUser);

            return response()->json(['success'=>'Data is successfully added']);
            }


        }

    }

        public function destroy()
    {
        auth()->logout();

        return redirect('/index');
    }
}
