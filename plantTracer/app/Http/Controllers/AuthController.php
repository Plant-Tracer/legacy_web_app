<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Validation\validEmail;
use App\User;
use Validator;
use DB;
use Hash;
use Auth;
use JavaScript;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $isLoggedIn = true;

            JavaScript::put([
                'isLoggedIn' => $isLoggedIn
            ]);
        }
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

            $validator = \Validator::make($request->all(), [
    
            'email' => ['bail','required','unique:users','max:255'],
            
            'password'=> 'bail|required|min:6|confirmed',

            'password_confirmation' => 'bail|required|min:6',

        ]);

        if ($validator->fails()){

            //return $request;
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

        if(DB::table('plant_tracing')->where('researcher','=',request(['email']))->exists()){

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        auth()->logout();

        return redirect('index');
    }
}
